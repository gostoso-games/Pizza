<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends Controller
{
    use AuthorizesRequests;

    public function setadmin(Request $request, User $user)
    {
        
        $user->update(['role' => 'admin']);

        return back()->with('success', 'Administrador definido com sucesso!');
    }

    public function index(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if (!$user->two_factor_confirmed_at) {
            return view('auth.qrcode');
        }

        $this->authorize('isAdmin', User::class);

        $products = Products::orderBy('id', 'desc')->paginate(10);
        $users = User::all();

        return view('admin.admin', compact('products', 'users'));
    }

    public function storeProduct(Request $request)
    {
        $this->authorize('isAdmin', User::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = new Products();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/cards_img'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return back()->with('success', 'Produto adicionado com sucesso!');
    }

    public function updateProduct(Request $request, $id)
    {
        $this->authorize('isAdmin', User::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = Products::findOrFail($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('image')) {
            if ($product->image) {
                File::delete(public_path('img/cards_img/' . $product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/cards_img'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return back()->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroyProduct($id)
    {
        $this->authorize('isAdmin', User::class);

        $product = Products::findOrFail($id);

        if ($product->image) {
            File::delete(public_path('img/cards_img/' . $product->image));
        }

        $product->delete();

        return back()->with('success', 'Produto removido!');
    }

    public function destroyUser(User $user)
    {
        $this->authorize('isAdmin', User::class);

        $user->delete();

        return back()->with('success', 'Usuário removido!');
    }
}
