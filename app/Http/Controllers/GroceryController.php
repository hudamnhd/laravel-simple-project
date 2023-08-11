<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use Illuminate\Http\Request;

class GroceryController extends Controller
{
    //Add Product
    public function addProduct()
    {
        $selectedFiles = [];
        return view('grocery.add-product');
    }

    public function storeProduct(Request $request)
    {
        $data = new Postimage();

        // Menangkap data dari input
        $data->title = $request->input('title');
        $data->overview = $request->input('overview');
        $data->category = json_encode($request->input('category'));
        $data->priceTextValue = $request->input('priceTextValue');
        $data->selectBudget = $request->input('selectBudget');
        $imagesArray = []; // Array untuk menyimpan nama-nama file gambar

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
                $file->move(public_path('assets/image'), $filename);
                $imagesArray[] = $filename; // Tambahkan nama file ke dalam array
            }
        }

        if ($request->hasFile('image2')) {
            $files = $request->file('image2');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
                $file->move(public_path('assets/image'), $filename);
                $imagesArray[] = $filename; // Tambahkan nama file ke dalam array
            }
        }
        if ($request->hasFile('image3')) {
            $files = $request->file('image3');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
                $file->move(public_path('assets/image'), $filename);
                $imagesArray[] = $filename; // Tambahkan nama file ke dalam array
            }
        }

        // Convert the array to a JSON string
        $data->images = json_encode($imagesArray);

        $data->save();
        return redirect()->route('products.list');
    }

    public function editProduct($id)
    {
        // Get the Postimage data from the database based on the given $id
        $data = Postimage::find($id);

        if (!$data) {
            // Handle the case when the Postimage data is not found
            return redirect()->route('grocery.index')->with('error', 'Image data not found.');
        }

        // Decode the JSON-encoded fields
        $data->category = json_decode($data->category);
        $data->images = json_decode($data->images);

        // Pass the data to the view for editing
        return view('grocery.edit-product', compact('data'));
    }
    public function updateProduct(Request $request, $id)
    {
        $data = Postimage::find($id);

        if (!$data) {
            return redirect()->route('products.list')->with('error', 'Image data not found.');
        }

        // Update the data with the new values
        $data->title = $request->input('title');
        $data->overview = $request->input('overview');
        $data->category = json_encode($request->input('category'));
        $data->priceTextValue = $request->input('priceTextValue');
        $data->selectBudget = $request->input('selectBudget');
        $imagesArray = []; // Array untuk menyimpan nama-nama file gambar
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
                $file->move(public_path('assets/image'), $filename);
                $imagesArray[] = $filename;
            }
        } else {
            // If no new images provided, retain the existing images
            $existingImages = json_decode($data->images, true);
            if (is_array($existingImages)) {
                $imagesArray = $existingImages;
            }
        }
        if ($request->hasFile('image2')) {
            $files = $request->file('image2');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
                $file->move(public_path('assets/image'), $filename);
                $imagesArray[] = $filename; // Tambahkan nama file ke dalam array
            }
        }
        if ($request->hasFile('image3')) {
            $files = $request->file('image3');
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
                $file->move(public_path('assets/image'), $filename);
                $imagesArray[] = $filename; // Tambahkan nama file ke dalam array
            }
        }
        $data->images = json_encode($imagesArray);

        $data->save();

        return redirect()->route('products.list')->with('success', 'Image data updated successfully.');
    }


    //View image

    public function listProducts(Request $request)
    {
        $keyword = $request->keyword;
        if (strlen($keyword)) {
            $data = Postimage::where('title', 'like', "%$keyword%")
                ->orWhere('category', 'like', "%$keyword%")
                ->orWhere('overview', 'like', "%$keyword%");
        } else {
            $data = Postimage::query(); // Inisialisasi jika tidak ada keyword
        }

        $imageData = $data->get();

        // Pastikan data $imageData->category adalah array
        foreach ($imageData as $data) {
            if (is_string($data->category)) {
                $data->category = json_decode($data->category, true);
            }

            if (is_string($data->images)) {
                $data->images = json_decode($data->images, true);
            }
        }

        return view('grocery.index', compact('imageData'));
    }

    public function deleteImage($id, $imageIndex)
    {
        $postImage = Postimage::find($id);

        if (!$postImage) {
            return redirect()
                ->route('products.list')
                ->with('error', 'Gambar tidak ditemukan.');
        }

        $images = json_decode($postImage->images, true);

        if (isset($images[$imageIndex])) {
            $imageToDelete = $images[$imageIndex];

            // Hapus file gambar dari direktori
            $imagePath = public_path('assets/image/') . $imageToDelete;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Hapus nama file gambar dari array
            array_splice($images, $imageIndex, 1);

            // Encode array kembali ke JSON dan simpan kembali di database
            $postImage->images = json_encode(array_values($images));
            $postImage->save();

            return redirect()
                ->route('products.list')
                ->with('success', 'Gambar berhasil dihapus.');
        }

        return redirect()
            ->route('products.list')
            ->with('error', 'Gambar tidak ditemukan.');
    }

    public function deleteProduct($id)
    {
        $postImage = Postimage::find($id);

        if (!$postImage) {
            return redirect()
                ->route('products.list')
                ->with('error', 'Data tidak ditemukan.');
        }

        // Delete associated images from the public directory
        $images = json_decode($postImage->images, true);
        foreach ($images as $image) {
            $imagePath = public_path('assets/image/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the row from the database
        $postImage->delete();

        return redirect()
            ->route('products.list')
            ->with('success', 'Data berhasil dihapus.');
    }

    // Get Data from input
    public function storeImagex(Request $request)
    {
        dd($request->all());
    }
}

// Post 1 imag eke database
// public function storeImage(Request $request)
// {
//     $data = new Postimage();
//     if ($request->file('image')) {
//         $file = $request->file('image');
//         $extension = $file->getClientOriginalExtension();
//         $filename = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
//         $file->move(public_path('assets/image'), $filename);
//         $data['image'] = $filename;
//     }
//
//     if ($request->file('image2')) {
//         $file = $request->file('image2');
//         $extension = $file->getClientOriginalExtension();
//         $filename2 = 'img-' . date('YmdHis') . '-' . uniqid() . '.' . $extension;
//         $file->move(public_path('assets/image'), $filename2);
//         $data['image2'] = $filename2;
//     }
//     $data->save();
//     return redirect()->route('images.view');
// }

//delete 1 image ke database
// public function deleteImage($id)
// {
//     $postImage = Postimage::find($id); // Mencari data gambar berdasarkan ID
//
//     if (!$postImage) {
//         return redirect()->route('images.view')->with('error', 'Gambar tidak ditemukan.'); // Jika gambar tidak ditemukan, kembali ke halaman tampilan gambar dengan pesan error
//     }
//
//     $imagePath = public_path('assets/image/') . $postImage->image; // Mendapatkan path lengkap dari gambar
//
//     if (file_exists($imagePath)) {
//         unlink($imagePath); // Menghapus file gambar dari direktori
//     }
//
//     $postImage->delete(); // Menghapus data gambar dari database
//
//     return redirect()->route('images.view')->with('success', 'Gambar berhasil dihapus.'); // Redirect kembali ke halaman tampilan gambar dengan pesan sukses
// }
