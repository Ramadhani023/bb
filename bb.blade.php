<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Cheatsheet</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSRF Token for Forms -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Laravel Cheatsheet</h1>

        <!-- Common Artisan Commands -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Common Artisan Commands</h3>
        <ul class="list-disc pl-6">
            <li><strong>Create Controller:</strong> <code>php artisan make:controller NameController</code></li>
            <li><strong>Run Migrations:</strong> <code>php artisan migrate</code></li>
            <li><strong>Clear Cache:</strong> <code>php artisan cache:clear</code></li>
            <li><strong>Serve Application:</strong> <code>php artisan serve</code></li>
        </ul>

        <!-- Routes -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Routes</h3>
        <ul class="list-disc pl-6">
            <li><strong>Define Route:</strong> <code>Route::get('/path', [Controller::class, 'method']);</code></li>
            <li><strong>Named Route:</strong> <code>Route::name('route.name');</code></li>
            <li><strong>Redirect Route:</strong> <code>Route::redirect('/from', '/to');</code></li>
        </ul>

        <!-- Blade Directives -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Blade Directives</h3>
        <ul class="list-disc pl-6">
            <li><strong>Echo:</strong> <code>&#64;&#123;&#123; variable &#125;&#125;</code></li>
            <li><strong>Conditional:</strong> <code>&#64;if(condition) &#64;endif</code></li>
            <li><strong>For Loop:</strong> <code>&#64;for($i = 0; $i &lt; 10; $i++) &#64;endfor</code></li>
        </ul>

        <!-- Database Queries (Eloquent) -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Database Queries (Eloquent)</h3>
        <ul class="list-disc pl-6">
            <li><strong>Retrieve All Records:</strong> <code>Model::all();</code></li>
            <li><strong>Find by ID:</strong> <code>Model::find($id);</code></li>
            <li><strong>Create Record:</strong> <code>Model::create(['column' => 'value']);</code></li>
        </ul>

        <!-- Responsive Pages -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Responsive Pages</h3>
        <ul class="list-disc pl-6">
            <li><strong>Responsive Table:</strong></li>
            <pre><code>&lt;table class="table-auto w-full"&gt;...&lt;/table&gt;</code></pre>

            <li><strong>Form Layout:</strong> Use Tailwind's grid system for responsive forms.</li>
            <pre><code>&lt;form&gt;
    &lt;div class="grid grid-cols-1 md:grid-cols-2 gap-6"&gt;
        &lt;div&gt;
            &lt;!-- Input fields --&gt;
        &lt;/div&gt;
        &lt;div&gt;
            &lt;!-- Input fields --&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>
        </ul>

        <!-- CRUD with Resource Routes -->
        <h3 class="text-xl font-semibold mt-6 mb-2">CRUD with Resource Routes</h3>
        <ul class="list-disc pl-6">
            <li><strong>Create Resource Controller:</strong> <code>php artisan make:controller ProductController
                    --resource</code></li>
            <li><strong>Define Resource Routes:</strong> <code>Route::resource('products',
                    ProductController::class);</code></li>
            <li><strong>Generated Routes:</strong> Handles <code>index</code>, <code>create</code>, <code>store</code>,
                <code>show</code>, <code>edit</code>, <code>update</code>, and <code>destroy</code> actions.
            </li>
            <li><strong>Example Resource Route:</strong></li>
            <pre><code>Route::resource('products', ProductController::class);</code></pre>
        </ul>

        <!-- Sample CRUD Controller Actions -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Sample CRUD Actions</h3>
        <ul class="list-disc pl-6">
            <li><strong>Store Method (for creating a product):</strong></li>
            <pre><code>public function store(Request $request) {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    Product::create($validatedData);
    return redirect()-&gt;route('products.index');
}</code></pre>

            <li><strong>Update Method (for updating a product):</strong></li>
            <pre><code>public function update(Request $request, Product $product) {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
    ]);

    $product-&gt;update($validatedData);
    return redirect()-&gt;route('products.index');
}</code></pre>
        </ul>

        <!-- Example of Form for Adding/Editing -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Form for Adding or Editing a Product</h3>
        <ul class="list-disc pl-6">
            <pre><code>&lt;form action="&#123;&#123; route('products.store') &#125;&#125;" method="POST"&gt;
    @csrf
    &lt;div class="mb-4"&gt;
        &lt;label for="name" class="block text-sm font-medium text-gray-700"&gt;Product Name&lt;/label&gt;
        &lt;input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required&gt;
    &lt;/div&gt;
    &lt;div class="mb-4"&gt;
        &lt;label for="price" class="block text-sm font-medium text-gray-700"&gt;Price&lt;/label&gt;
        &lt;input type="number" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required&gt;
    &lt;/div&gt;
    &lt;button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded"&gt;Save&lt;/button&gt;
&lt;/form&gt;</code></pre>
        </ul>

        <!-- Pagination -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Pagination</h3>
        <ul class="list-disc pl-6">
            <li><strong>Paginate Records in Controller:</strong></li>
            <pre><code>$products = Product::paginate(10);</code></pre>
            <li><strong>Paginate Links in View:</strong></li>
            <pre><code>&#123;&#123; $products-&gt;links() &#125;&#125;</code></pre>
        </ul>

        <!-- Helpful Links -->
        <h3 class="text-xl font-semibold mt-6 mb-2">Helpful Links</h3>
        <ul class="list-disc pl-6">
            <li><a href="https://laravel.com/docs" target="_blank" class="text-indigo-500 hover:underline">Laravel
                    Documentation</a></li>
            <li><a href="https://laracasts.com" target="_blank" class="text-indigo-500 hover:underline">Laracasts
                    (Laravel Tutorials)</a></li>
        </ul>
    </div>

    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Laravel CRUD Cheatsheet</h1>

        {{-- create new project --}}
        <h3>composer create-project laravel/laravel project_name</h3>
        <!-- 1. Full CRUD Guide -->
        <h2 class="text-xl font-semibold mt-6 mb-2">Full CRUD Guide</h2>

        <h3 class="text-lg font-semibold mt-4 mb-2">1. Create Model and Migration</h3>
        <pre><code>php artisan make:model Product -m</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">2. Define Migration Structure</h3>
        <pre><code>Schema::create('products', function (Blueprint $table) {
    $table-&gt;id();
    $table-&gt;string('name');
    $table-&gt;decimal('price', 8, 2);
    $table-&gt;timestamps();
});</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">3. Run Migrations</h3>
        <pre><code>php artisan migrate</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">4. Create Controller</h3>
        <pre><code>php artisan make:controller ProductController --resource</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">5. Define Resource Routes</h3>
        <pre><code>Route::resource('products', ProductController::class);</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">6. Implement Controller Methods</h3>
        <pre><code>public function index() {
    $products = Product::all();
    return view('products.index', compact('products'));
}

public function create() {
    return view('products.create');
}

public function store(Request $request) {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
    ]);
    Product::create($validatedData);
    return redirect()->route('products.index');
}

public function show(Product $product) {
    return view('products.show', compact('product'));
}

public function edit(Product $product) {
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product) {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
    ]);
    $product->update($validatedData);
    return redirect()->route('products.index');
}

public function destroy(Product $product) {
    $product->delete();
    return redirect()->route('products.index');
}</code></pre>

        <!-- 2. Responsive Table Page -->
        <h2 class="text-xl font-semibold mt-6 mb-2">Responsive Table Page</h2>

        <h3 class="text-lg font-semibold mt-4 mb-2">Table Structure in Blade</h3>
        <pre><code>&lt;table class="min-w-full bg-white"&gt;
    &lt;thead&gt;
        &lt;tr class="w-full bg-gray-200"&gt;
            &lt;th class="py-2 px-4 border"&gt;ID&lt;/th&gt;
            &lt;th class="py-2 px-4 border"&gt;Name&lt;/th&gt;
            &lt;th class="py-2 px-4 border"&gt;Price&lt;/th&gt;
            &lt;th class="py-2 px-4 border"&gt;Actions&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &#64;foreach ($products as $product)
            &lt;tr&gt;
                &lt;td class="py-2 px-4 border"&gt;&#123;&#123; $product-&gt;id &#125;&#125;&lt;/td&gt;
                &lt;td class="py-2 px-4 border"&gt;&#123;&#123; $product-&gt;name &#125;&#125;&lt;/td&gt;
                &lt;td class="py-2 px-4 border"&gt;&#123;&#123; $product-&gt;price &#125;&#125;&lt;/td&gt;
                &lt;td class="py-2 px-4 border"&gt;
                    &lt;a href="&#123;&#123; route('products.edit', $product) &#125;&#125;" class="text-blue-500"&gt;Edit&lt;/a&gt; | 
                    &lt;form action="&#123;&#123; route('products.destroy', $product) &#125;&#125;" method="POST" class="inline"&gt;
                        @csrf
                        @method('DELETE')
                        &lt;button type="submit" class="text-red-500"&gt;Delete&lt;/button&gt;
                    &lt;/form&gt;
                &lt;/td&gt;
            &lt;/tr&gt;
        &#64;endforeach
    &lt;/tbody&gt;
&lt;/table&gt;</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">Pagination in Controller</h3>
        <pre><code>public function index() {
    $products = Product::paginate(10);
    return view('products.index', compact('products'));
}</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">Pagination Links in Blade</h3>
        <pre><code>&#123;&#123; $products-&gt;links() &#125;&#125;</code></pre>

        <!-- 3. Full Routing, Controller, Model Guide -->
        <h2 class="text-xl font-semibold mt-6 mb-2">Full Routing, Controller, Model Guide</h2>

        <h3 class="text-lg font-semibold mt-4 mb-2">Routing in web.php</h3>
        <pre><code>Route::resource('products', ProductController::class);</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">Product Model</h3>
        <pre><code>namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $fillable = ['name', 'price'];
}</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">Controller Structure</h3>
        <pre><code>namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    // Controller methods here...
}</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">Creating Views</h3>
        <ul class="list-disc pl-6">
            <li><strong>Index View:</strong> Displays a list of products.</li>
            <li><strong>Create View:</strong> Form to add a new product.</li>
            <li><strong>Edit View:</strong> Form to edit an existing product.</li>
            <li><strong>Show View:</strong> Displays details of a product.</li>
        </ul>

        <h3 class="text-lg font-semibold mt-4 mb-2">Example Create View</h3>
        <pre><code>&lt;form action="&#123;&#123; route('products.store') &#125;&#125;" method="POST"&gt;
    @csrf
    &lt;div class="mb-4"&gt;
        &lt;label for="name" class="block"&gt;Product Name&lt;/label&gt;
        &lt;input type="text" name="name" class="border rounded p-2" required&gt;
    &lt;/div&gt;
    &lt;div class="mb-4"&gt;
        &lt;label for="price" class="block"&gt;Price&lt;/label&gt;
        &lt;input type="number" name="price" class="border rounded p-2" required&gt;
    &lt;/div&gt;
    &lt;button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded"&gt;Add Product&lt;/button&gt;
&lt;/form&gt;</code></pre>

        <h3 class="text-lg font-semibold mt-4 mb-2">Example Edit View</h3>
        <pre><code>&lt;form action="&#123;&#123; route('products.update', $product) &#125;&#125;" method="POST"&gt;
    @csrf
    @method('PUT')
    &lt;div class="mb-4"&gt;
        &lt;label for="name" class="block"&gt;Product Name&lt;/label&gt;
        &lt;input type="text" name="name" class="border rounded p-2" value="&#123;&#123; $product-&gt;name &#125;&#125;" required&gt;
    &lt;/div&gt;
    &lt;div class="mb-4"&gt;
        &lt;label for="price" class="block"&gt;Price&lt;/label&gt;
        &lt;input type="number" name="price" class="border rounded p-2" value="&#123;&#123; $product-&gt;price &#125;&#125;" required&gt;
    &lt;/div&gt;
    &lt;button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded"&gt;Update Product&lt;/button&gt;
&lt;/form&gt;</code></pre>

        <h2 class="text-xl font-semibold mt-6 mb-2">Conclusion</h2>
        <p>This cheatsheet provides a comprehensive guide for implementing a CRUD application in Laravel with Tailwind
            CSS. Follow the steps and examples provided to create a fully functional application.</p>
    </div>
</body>

</html>
