<?php

namespace App\Http\Controllers;

use App\Models\DocumentRequest;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    public function index()
    {
        $requests = DocumentRequest::all();
        return view('document_requests.index', compact('requests'));
    }
    public function create()
    {
        return view('document_requests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string',
            'document_type' => 'required|string',
            'request_date' => 'required|date',
        ]);

        DocumentRequest::create($request->all());

        return redirect()->route('document_requests.index')
                         ->with('success', 'Request created successfully.');
    }

    public function edit(DocumentRequest $documentRequest)
    {
        return view('document_requests.edit', compact('documentRequest'));
    }

    public function update(Request $request, DocumentRequest $documentRequest)
    {
        $request->validate([
            'student_name' => 'required|string',
            'document_type' => 'required|string',
            'request_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $documentRequest->update($request->all());

        return redirect()->route('document_requests.index')
                         ->with('success', 'Request updated successfully.');
    }
    public function destroy(DocumentRequest $documentRequest)
    {
        $documentRequest->delete();

        return redirect()->route('document_requests.index')
                         ->with('success', 'Request deleted successfully.');
    }
}


