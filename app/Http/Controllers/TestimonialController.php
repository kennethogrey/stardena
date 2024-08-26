<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::paginate(5);
        return view('testimonials.index', [
            'testimonials'=>$testimonials,
        ]);
    }

    public function create(){
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validTestimony = $request->validate([
            'name' => 'required|unique:testimonials,name' ,
            'occupation' => 'required|unique:testimonials,occupation',
            'image' => 'required|mimes:jpeg,png,jpg|max:5120',
            'message' => 'required'
        ]);

        $fileName = $this->getName($request);

        // Create a new Testimonial instance and assign the validated data
        $testimonial = new Testimonial();
        $testimonial->name = $validTestimony['name'];
        $testimonial->occupation = $validTestimony['occupation'];
        $testimonial->image = $fileName;
        $testimonial->message = $validTestimony['message'];

        // Save the testimonial and check if it was successful
        $testimonial = $testimonial->save();
        // Redirect to the testimonials index page with a success message
        if($testimonial){
            return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully!');
        }else{
            return redirect()->route('testimonials.create')->with('error', 'Testimonial not added!');
        }
    }

    public function edit(Testimonial $testimonial){
        return view('testimonials.edit', [
            'testimonial' => $testimonial,
        ]);
    }

    public function update(Request $request, Testimonial $testimonial){
        $oldImage = $testimonial->image;

        $validTestimony = $request->validate([
            'name' => 'required|unique:testimonials,name,' . $testimonial->id,
            'occupation' => 'required|unique:testimonials,occupation,' . $testimonial->id,
            'image' => 'required|mimes:jpeg,png,jpg|max:5120',
            'message' => 'required'
        ]);

        $fileName = $this->getName($request);

        $testimonial->name = $validTestimony['name'];
        $testimonial->occupation = $validTestimony['occupation'];
        $testimonial->image = $fileName;
        $testimonial->message = $validTestimony['message'];

        // Save the testimonial and check if it was successful
        $testimonial = $testimonial->update();
        // Redirect to the testimonials index page with a success message
        if($testimonial){
            if ($oldImage && File::exists(public_path('/testimonialImages/'.$oldImage))) {
                File::delete(public_path('/testimonialImages/'.$oldImage));
            }
            return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully!');
        }else{
            return redirect()->route('testimonials.create')->with('error', 'Testimonial not updated!');
        }
    }

    public function destroy(Testimonial $testimonial){
        $testimonialImage = $testimonial->image;
       $deleted = $testimonial->delete();
       if($deleted){
           if ($testimonialImage && File::exists(public_path('/testimonialImages/'.$testimonialImage))) {
               File::delete(public_path('/testimonialImages/'.$testimonialImage));
           }
           return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully!');
       }else{
           return redirect()->route('testimonials.index')->with('error', 'Testimonial not deleted!');
       }
    }

    public function getName(Request $request): string
    {
        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $directory = public_path('/testimonialImages/');
        $path = $directory . $fileName;

        // Ensure the directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);
        $image = $image->resize(150, 150);
        $image->toPng()->save($path);
        return $fileName;
    }
}
