<!-- View extends layouts/app.blade.php -->
@extends ('layouts.app')
@section('content')

    <header class="flex items-center mb-3 py-4">

        <div class="flex justify-between items-end w-full">

            <p class="text-grey text-sm font-normal">

            <a href="/projects" class="text-grey text-sm font-normal no-underline">My Projects</a> / {{ $project->title }}

            </p>

            <a href="/projects/create" class="button bg-blue">Create project</a>

        </div>

    </header>

    <main>

        <div class="lg:flex -mx-3">

            <div class="lg:w-3/4 px-3 mb-6">

                <div class="mb-6">

                    <!-- Tasks -->
                    <h2 class="text-grey font-normal text-lg mb-3">Tasks</h2>

                    @foreach ($project->tasks as $task)

                        <div class="card mb-3">

                            <form method="POST" action="{{ $task->path() }}">

                                    @method('PATCH')

                                    @csrf

                                    <div class="flex">

                                        <input name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'border-l-4 border-green' : 'border-l-4 border-red' }}">

                                        <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>

                                    </div>

                            </form>

                        </div>

                    @endforeach  

                    <div class="card mb-3">

                        <form action="{{ $project->path() . '/tasks' }}" method="POST">
                            
                            @csrf

                            <input type="text" name="body" placeholder="Add a new task.." class="w-full">

                        </form>

                    </div>

                </div>

                <div class="mb-6">

                    <!-- General Notes -->
                    <h2 class="text-grey font-normal text-lg mb-3">General Notes</h2>
                    <textarea class="card w-full" style="min-height: 200px;">Lorem Ipsum.</textarea>

                </div>

            </div>

            <div class="lg:w-1/4 px-3">

                @include ('projects.card')

                <a href="/projects">Go Back</a>

            </div>

        </div>

    </main>

</body>
</html> 

@endsection