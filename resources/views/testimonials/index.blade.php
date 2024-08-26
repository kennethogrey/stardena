<x-app-layout>
    @section('title', 'Testimonials')
    @section('content')
        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title mb-0">Testimonials</h4>
                                    <a href="/testimonials/create" class="btn btn-primary text-white">Add</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Occupation</th>
                                            <th>Message</th>
                                            <th>Image</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($testimonials as $testimonial)
                                            <tr>
                                                <td>{{$testimonial->name}}</td>
                                                <td>{{$testimonial->occupation}}</td>
                                                <td>{{$testimonial->message}}</td>
                                                <td><img width="50px" height="50px" alt="pic" src="{{ asset('testimonialImages/' . $testimonial->image) }}"></td>
                                                <td>
                                                    <a href="/testimonials/{{$testimonial->id}}" class="btn mb-1 btn-primary text-white">Edit <i class="fa fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    <form action="/testimonials/{{$testimonial->id}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn mb-1 btn-rounded btn-danger text-white confirm-de-activate">
                                                            <span class="btn-icon-left"><i class="fa fa-plus color-info"></i> </span>Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Testimonies found...</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Occupation</th>
                                            <th>Message</th>
                                            <th>Image</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    {{$testimonials->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection
</x-app-layout>
