<x-app-layout>
    @section('title', 'Testimonials')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row mb-4">
                    <div class="col-xl-7 col-xxl-4">
                        <p>
                            @include('livewire.home.session-component')
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="card-title">Edit Testimonial</h4>
                                <div class="basic-form">
                                    <form action="{{route('testimonials.update',$testimonial->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PATCH")
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="name">Person's Name</label>
                                                    <input id="name" name="name" value="{{$testimonial->name}}" class="form-control" type="text" aria-label="name">
                                                    @error('name')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="occupation">Person's Occupation</label>
                                                    <input id="occupation" name="occupation" value="{{$testimonial->occupation}}" class="form-control" type="text" aria-label="occupation">
                                                    @error('occupation')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row align-items-end">
                                                <div class="col-md-1">
                                                    <div class="text-center mb-3">
                                                        <img src="{{ asset('testimonialImages/' . $testimonial->image) }}" class="rounded" alt="favicon" width="50px" height="50px">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="image">Photo</label>
                                                        <input id="image" name="image" class="form-control" type="file" aria-label="image">
                                                        @error('image')
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="message">Message</label>
                                            <textarea id="message" name="message" class="form-control" placeholder="Write a brief message.">{{$testimonial->message}}</textarea>
                                            @error('message')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
</x-app-layout>
