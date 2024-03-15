
<section>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Profile Photo') }}
    </h2>
        <div class="mt-6">
            @php
                $profile_photo = auth()->user()->profile_photo;
                $profile_photo_path = asset('storage/profile-photos/'.$profile_photo);
            @endphp

            @if ($profile_photo && file_exists(public_path('storage/profile-photos/'.$profile_photo)))
                <img src="{{ $profile_photo_path }}" alt="Profile Photo" class="mt-2 h-40 w-auto rounded-full" />
            @else
                <p>No profile photo found</p>
            @endif
        </div>

    <form method="POST" action="{{ route('user-photo') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="mt-6">
            <span id="photoFileName" class="block mt-2 text-sm text-gray-500"></span>
            <img id="previewImage" src="#" alt="Preview" class="mt-2 h-40 w-auto rounded-full" style="display: none;" />
            <input type="file" id="photo" name="photo" class="mt-1 block" accept="image/*" required />
        </div>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Save
        </button>
    </form>
</section>

<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        var input = event.target;
        var fileName = input.files[0].name;
        document.getElementById('photoFileName').textContent = fileName;
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('previewImage').style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
