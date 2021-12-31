<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $product, $categories;

    public function __construct(Product $product, Category $categories)
    {
        $this->product = $product;
        $this->categories = $categories;
        $this->middleware(['can:categories']);
    }

    /**
     * Chama tela com listagem das CATEGORIAS de 
     * um PRODUTO
     */
    public function categories($idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        $categories = $product->categories()->paginate();

        return view('admin.pages.products.categories.categories', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Chama tela com listagem dos PERFIS de 
     * uma PERMISSÃO
     */
    public function products($idCategory)
    {
        $categories = $this->categories->find($idCategory);

        if (!$categories) {
            return redirect()->back();
        }

        $products = $categories->products()->paginate();

        return view('admin.pages.categories.products.products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Chama a Página de 
     * CADASTRO permissão ao perfil
     * FILTRO também tem a função de buscar por nome 
     * do perfil
     */
    public function categoriesAvailable(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categories = $product->categoriesAvailable($request->filter);

        return view('admin.pages.products.categories.available', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Addicionar permissão ao perfil
     */
    public function attachcategoriesProfile(Request $request, $idProduct)
    {
        $product = $this->product->find($idProduct);

        if (!$product) {
            return redirect()->back();
        }

        if (!$request->categories || count($request->categories) == 0) {
            return redirect()
                ->back()
                ->with('infor', 'Precisa escolher pelo menos uma permissão.');
        }

        $product->categories()->attach($request->categories);

        return redirect()->route('products.categories', $product->id);
    }

    /**
     * DESVINCULAR permissão de perfil
     */
    public function detachCategoriesProduct($idProduct, $idCategory)
    {
        $product = $this->product->find($idProduct);
        $categories = $this->categories->find($idCategory);

        if (!$product || !$categories) {
            return redirect()->back();
        }

        $product->categories()->detach($categories);

        return redirect()->route('products.categories', $product->id);
    }
}
