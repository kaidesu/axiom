<!DOCTYPE html>
<html>

<head>
    <title>Axiom</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto">
        <h1 class="mb-6">Create a Project</h1>

        <form action="/projects" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="title">Title</label>
                
                <div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="text" name="title" placeholder="Title">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="description">Description</label>
                
                <div>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" name="description" placeholder="Description"></textarea>
                </div>
            </div>

            <div>
                <button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Create Project</button>
            </div>
        </form>
    </div>

</body>
</html>