<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    public function index()
    {
        // Obtener todos los productos
        $productos = Producto::all();

        // Retornar una vista que muestre los productos
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        // Retornar una vista para crear un nuevo producto
        return view('productos.create');
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'sku' => 'required|string',
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Asegúrate de configurar bien los tipos y tamaños de las imágenes permitidas
    ]);

    // Procesar y guardar la imagen
    $imagenNombre = $request->file('image')->store('imagenes_productos');

    // Crear el producto en la base de datos
    $producto = new Producto();
    $producto->sku = $request->sku;
    $producto->nombre = $request->name;
    $producto->descripcion = $request->description;
    $producto->precio = $request->price;
    $producto->imagen = $imagenNombre;
    $producto->save();

    // Redireccionar o devolver una respuesta adecuada
    return redirect()->route('productos.index')->with('status', 'Producto creado exitosamente');
}

}

