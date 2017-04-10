<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BooksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if( $this->route()->getAction()['as'] == 'books.store' ){
            return true;
        }

        if( $this->route()->getAction()['as'] == 'books.update' ){
            $id = $this->route('book');
            $book = Book::find($id);
            if( $book->author_id == Auth::getUser()->id){
                return true;
            }
            return false;
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('book');
        return [
            'title' => "required|max:255|unique:books,title,$id",
            'price' => "required|numeric"
        ];
    }
}
