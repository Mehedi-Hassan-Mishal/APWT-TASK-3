<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
               

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close", data-dismiss="alert" arial-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form action="{{route('update')}}" method="POST">
                    @csrf
                    <label for="exampleInputEmail">Name:</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter name">
                    
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br><br>
                    
                    <label for="exampleInputEmail">Email:</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br><br>
                    
                    <div class="form-group">
                    <button type="submit">Update</button></div>
</form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
