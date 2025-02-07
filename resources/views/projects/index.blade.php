@extends('layout.main')
@section('content')

<style>
    .img-fluid {
        width: 100%;
        height: auto;
    }

    .text-overlay,
    .price-overlay,
    .buttons {
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .buttons {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
    }

    .text-overlay {
        position: absolute;
        bottom: 10px;
        left: 10px;
        color: white;
        font-size: 1.2rem;
        padding: 8px 12px;
        text-align: left;
    }

    .price-overlay {
        position: absolute;
        bottom: 10px;
        right: 10px;
        color: white;
        font-size: 1.2rem;
        padding: 8px 12px;
        text-align: right;
    }

    .card:hover .text-overlay,
    .card:hover .price-overlay,
    .card:hover .buttons {
        opacity: 1;
    }

    @media (min-width: 1200px) and (max-width: 1399.98px) {
        .custom-col-xl {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (min-width: 1400px) {
        .custom-col-xl {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
    }
</style>

<div class="card card-statistic-1">
    <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
    </div>
    <div class="card-wrap">
        <div class="card-header">
            <h4>Project</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    {{ $projects->count() }}
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 mt-1 mb-1">
                            <!-- Search Input -->
                            <input type="text" class="form-control" id="search-input" placeholder="Search projects...">
                        </div>
                        <div class="col-lg-4 mt-1 mb-1">
                            <!-- Filter Dropdown -->
                            @php
                            $categories =
                            \App\Models\Project::select('category_project')->distinct()->pluck('category_project');
                            @endphp

                            <select id="category-filter" class="form-control">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 mt-1 mb-1">
                            <!-- Add Button -->
                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aw,
                                yeah!</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(auth()->check() && auth()->user()->role == 'admin')
    <button class="btn btn-primary" id="modal-5">Add Project</button>
@endif

<form class="modal-part" id="modal-login-part" action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nama Project</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-file"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Nama Project" name="name" required>
        </div>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Harga</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calculator"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Harga" name="price" required>
        </div>
        @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="paid_link">Link Berbayar</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Link Pembelian" name="paid_link" required>
        </div>
        @error('paid_link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="free_link">Link Gratis</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-gift"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Link Gratis" name="free_link" required>
        </div>
        @error('free_link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="demo_link">Link Demo</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Link Demo" name="demo_link" required>
        </div>
        @error('demo_link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_project">Kategori Project</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-tag"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Kategori Project" name="category_project" required>
        </div>
        @error('category_project')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image_link">Link Gambar</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-image"></i>
                </div>
            </div>
            <input type="text" class="form-control" placeholder="Link Gambar" name="image_link" required>
        </div>
        <span>Link harus diakhiri dengan .jpg</span>
        @error('image_link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</form>



<!-- Projects Display -->
<div id="projects-list" class="row mt-3">
    @foreach($projects as $project)
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 custom-col-xl">
        <div class="card">
            <div class="chocolat-parent">
                <div class="img-fluid position-relative">
                    <img alt="{{ $project->name }}" src="{{ $project->image_link }}" class="img-fluid">
                    <a href="{{ $project->demo_link }}">
                        <p class="text-overlay">{{ $project->name }}</p>
                    </a>
                    <p class="price-overlay">$ {{ $project->price }}</p>
                    <div class="buttons">
                        <a href="{{ $project->paid_link }}" class="btn btn-outline-primary btn-lg btn-icon icon-left">Buy</a>
                        <a href="{{ $project->free_link }}" class="btn btn-primary btn-lg">Free</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@push('js')
<script>
    // Live Search and Category Filter Combination
    function fetchAndUpdateProjects(query, category) {
        let url = `/projects/live-search?query=${encodeURIComponent(query)}`;
        if (category) {
            url += `&category=${encodeURIComponent(category)}`;
        }

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.projects.length > 0) {
                    updateProjectsList(data.projects);
                } else {
                    document.getElementById('projects-list').innerHTML = '<p>No projects found.</p>';
                }
            })
            .catch(error => console.error('Error:', error));
    }

    document.getElementById('search-input').addEventListener('input', function() {
        let query = this.value.trim();
        let category = document.getElementById('category-filter').value;
        fetchAndUpdateProjects(query, category);
    });

    document.getElementById('category-filter').addEventListener('change', function() {
        let category = this.value;
        let query = document.getElementById('search-input').value.trim();
        fetchAndUpdateProjects(query, category);
    });

    // Update Projects List
    function updateProjectsList(projects) {
        let resultsDiv = document.getElementById('projects-list');
        resultsDiv.innerHTML = '';

        if (projects.length > 0) {
            projects.forEach(project => {
                let projectCard = `
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 custom-col-xl">
                        <div class="card">
                            <div class="chocolat-parent">
                                <div class="img-fluid position-relative">
                                    <img alt="${project.name}" src="${project.image_link}" class="img-fluid">
                                    <a href="${project.demo_link}">
                                        <p class="text-overlay">${project.name}</p>
                                    </a>
                                    <p class="price-overlay">$ ${project.price}</p>
                                    <div class="buttons">
                                        <a href="${project.paid_link}" class="btn btn-lg btn-danger">Buy</a>
                                        <a href="${project.free_link}" class="btn btn-lg btn-danger">Free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                resultsDiv.innerHTML += projectCard;
            });
        } else {
            resultsDiv.innerHTML = '<p>No projects found.</p>';
        }
    }


    $("#modal-5").fireModal({
        title: 'Tambah Project Baru',
        body: $("#modal-login-part"),
        footerClass: 'bg-whitesmoke',
        autoFocus: false,
        onFormSubmit: function(modal, e, form) {
            // Data Form
            let form_data = $(e.target).serialize();

            // Melakukan AJAX
            $.ajax({
                url: "{{ route('projects.store') }}",
                method: "POST",
                data: form_data,
                success: function(response) {
                    // Redirect or show success message
                    window.location.href = "{{ route('projects') }}";
                },
                error: function(xhr) {
                    // Handle error
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    $.each(errors, function(key, value) {
                        errorMessages += '<p>' + value[0] + '</p>';
                    });
                    modal.find('.modal-body').prepend('<div class="alert alert-danger">' + errorMessages + '</div>');
                },
                complete: function() {
                    form.stopProgress();
                }
            });

            e.preventDefault();
        },
        shown: function(modal, form) {
            console.log(form)
        },
        buttons: [
            {
                text: 'Submit',
                submit: true,
                class: 'btn btn-primary btn-shadow',
                handler: function(modal) {}
            }
        ]
    });
</script>

@endpush
