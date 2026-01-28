@extends('backend.admin.dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendors/dropify/dist/dropify.min.css') }}">
@endpush

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="position-relative">
                  <figure class="overflow-hidden mb-0 d-flex justify-content-center">
                    <img src="{{ asset('Backend/assets/images/pbg.jpg') }}" class="rounded-top" alt="profile cover" style="width: 100%; height: 200px">
                  </figure>
                  <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
                    <div>
                      <img class="wd-70 rounded-circle" src="{{ ($admin->profile_photo_path) ? asset('upload/admin_images/' . $admin->profile_photo_path) : asset('backend/assets/images/faces/1.jpg') }}" alt="profile">
                      <span class="h4 ms-3 text-light">{{ $admin->name }}</span>
                      <p class="text-light mb-0 ms-3 mt-2 pt-2">Email: {{ $admin->email }}</p>
                      
                    </div>
                    <div class="d-none d-md-block">
                      <button class="btn btn-primary btn-icon-text">
                        <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
                      </button>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center p-3 rounded-bottom">
                  <ul class="d-flex align-items-center m-0 p-0">
                    <li class="d-flex align-items-center active">
                      <i class="me-1 icon-md text-primary" data-feather="columns"></i>
                      <a class="pt-1px d-none d-md-block text-primary" href="#">Timeline</a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                      <i class="me-1 icon-md" data-feather="user"></i>
                      <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                      <i class="me-1 icon-md" data-feather="users"></i>
                      <a class="pt-1px d-none d-md-block text-body" href="#">Friends <span class="text-muted tx-12">3,765</span></a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                      <i class="me-1 icon-md" data-feather="image"></i>
                      <a class="pt-1px d-none d-md-block text-body" href="#">Photos</a>
                    </li>
                    <li class="ms-3 ps-3 border-start d-flex align-items-center">
                      <i class="me-1 icon-md" data-feather="video"></i>
                      <a class="pt-1px d-none d-md-block text-body" href="#">Videos</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-3 left-wrapper">
              <div class="card rounded">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="card-title mb-0">About</h6>
                    <div class="dropdown">
                      <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="git-branch" class="icon-sm me-2"></i> <span class="">Update</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View all</span></a>
                      </div>
                    </div>
                  </div>
                  <p>{{ $admin->about ?? 'Update your profile to add a bio.' }}</p>
                  <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Joined:</label>
                    <p class="text-muted">{{ $admin->created_at ? $admin->created_at->diffForHumans() : 'Unknown' }}</p>
                  </div>
                  <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Lives:</label>
                    <p class="text-muted">{{ $admin->address ?? 'Not Set' }}</p>
                  </div>
                  <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                    <p class="text-muted">{{ $admin->email }}</p>
                  </div>
                  <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                    <p class="text-muted"><a href="{{ $admin->website }}" target="_blank">{{ $admin->website ?? 'Not Set' }}</a></p>
                  </div>
                  <div class="mt-3 d-flex social-links">
                    @if($admin->github)
                    <a href="{{ $admin->github }}" target="_blank" class="btn btn-icon border btn-xs me-2">
                      <i data-feather="github"></i>
                    </a>
                    @endif
                    @if($admin->twitter)
                    <a href="{{ $admin->twitter }}" target="_blank" class="btn btn-icon border btn-xs me-2">
                      <i data-feather="twitter"></i>
                    </a>
                    @endif
                    @if($admin->instagram)
                    <a href="{{ $admin->instagram }}" target="_blank" class="btn btn-icon border btn-xs me-2">
                      <i data-feather="instagram"></i>
                    </a>
                    @endif
                    @if($admin->linkedin)
                    <a href="{{ $admin->linkedin }}" target="_blank" class="btn btn-icon border btn-xs me-2">
                      <i data-feather="linkedin"></i>
                    </a>
                    @endif
                    @if($admin->facebook)
                    <a href="{{ $admin->facebook }}" target="_blank" class="btn btn-icon border btn-xs me-2">
                      <i data-feather="facebook"></i>
                    </a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-6 middle-wrapper">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="card rounded">
                    <div class="card-header">
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                          <img class="img-xs rounded-circle" src="{{ ($admin->profile_photo_path) ? asset('upload/admin_images/' . $admin->profile_photo_path) : asset('backend/assets/images/faces/1.jpg') }}" alt="{{ $admin->name }}">													
                          <div class="ms-2">
                            <p>{{ $admin->name }}</p>
                            <p class="tx-11 text-muted">{{ $admin->email }}</p>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('admin.update.profile', $admin->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      
                      {{-- $table->string('name');
                      $table->string('username')->unique()->nullable();
                      $table->string('phone')->unique()->nullable();
                      $table->string('address')->nullable();
                      $table->string('email')->unique();
                      $table->enum('role', ['admin', 'user'])->default('user');
                      $table->timestamp('email_verified_at')->nullable();
                      $table->string('password');
                      $table->string('profile_photo_path')->nullable(); --}}

                      <h6 class="card-title mb-3">Personal Information</h6>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="{{ $admin->first_name }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="{{ $admin->last_name }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="name">Display Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $admin->name }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $admin->username }}" readonly>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $admin->email }}" required readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $admin->phone }}">
                          </div>
                        </div>
                      </div>

                      <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ $admin->address }}">
                      </div>

                      <div class="form-group mb-3">
                        <label for="about">About</label>
                        <textarea class="form-control" id="about" name="about" rows="4" placeholder="Write something about yourself...">{{ $admin->about }}</textarea>
                      </div>

                      <h6 class="card-title mb-3 mt-4">Social Links</h6>
                      
                      <div class="form-group mb-3">
                        <label for="website">Website URL</label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="https://yourwebsite.com" value="{{ $admin->website }}">
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="github">GitHub URL</label>
                            <input type="text" class="form-control" id="github" name="github" placeholder="https://github.com/username" value="{{ $admin->github }}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-3">
                            <label for="twitter">Twitter URL</label>
                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="https://twitter.com/username" value="{{ $admin->twitter }}">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group mb-3">
                            <label for="instagram">Instagram URL</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/username" value="{{ $admin->instagram }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3">
                            <label for="linkedin">LinkedIn URL</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/username" value="{{ $admin->linkedin }}">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group mb-3">
                            <label for="facebook">Facebook URL</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="https://facebook.com/username" value="{{ $admin->facebook }}">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group mb-3" readonly>
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                          <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                          <option value="user" {{ $admin->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                      </div>

                      <div class="form-group mb-3">
                        <label for="image">Profile Image</label>
                        <input type="file" class="form-control" id="image" name="profile_photo_path" accept="image/*" data-default-file="{{ ($admin->profile_photo_path) ? asset('upload/admin_images/' . $admin->profile_photo_path) : asset('backend/assets/images/faces/1.jpg') }}">
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    
                      
                    </div>
                    
                  </div>
                </div>
                
              </div>
            </div>
            <!-- middle wrapper end -->
            <!-- right wrapper start -->
            <div class="d-none d-xl-block col-xl-3">
              <div class="row">
                <div class="col-md-12 grid-margin">
                  <div class="card rounded">
                    <div class="card-body">
                      <h6 class="card-title">latest photos</h6>
                      <div class="row ms-0 me-0">
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-2">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-2">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-2">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-2">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-2">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-2">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-0">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-0">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                        <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                          <figure class="mb-0">
                            <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                          </figure>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- right wrapper end -->
          </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('Backend/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#image').dropify();
        });
    </script>
@endpush
