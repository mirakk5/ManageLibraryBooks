<?php
namespace App\Controllers;
use App\Models\BookModel;
class Books extends BaseController
{
    protected $bookModel;
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }
    public function index()
    {
        $data['books'] = $this->bookModel->findAll();
        return view('books/index', $data);
    }
    public function create()
    {
        return view('books/create');
    }
    public function store()
    {
        $data = [
            'title'            => $this->request->getPost('title'),
            'author'           => $this->request->getPost('author'),
            'genre'            => $this->request->getPost('genre'),
            'publication_year' => $this->request->getPost('publication_year'),
        ];

        if (! $this->bookModel->save($data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->bookModel->errors());
        }

        return redirect()->to('/books')->with('message', 'Book successfully added.');
    }

    public function edit($id)
    {
        $data['book'] = $this->bookModel->find($id);
        if (! $data['book']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        return view('books/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'title'            => $this->request->getPost('title'),
            'author'           => $this->request->getPost('author'),
            'genre'            => $this->request->getPost('genre'),
            'publication_year' => $this->request->getPost('publication_year'),
        ];

        if (! $this->bookModel->update($id, $data)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->bookModel->errors());
        }

        return redirect()->to('/books')->with('message', 'Book successfully updated.');
    }

    public function delete($id)
    {
        $this->bookModel->delete($id);
        return redirect()->to('/books')->with('message', 'Book successfully deleted.');
    }
}