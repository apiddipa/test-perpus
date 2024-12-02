<div>
        <div class="card">
            <div class="card-header">
              kelola Member
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
                <input type="text" wire:model.live="cari" class="form-control w-50" placeholder="Cari...">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">telepon</th>
                        <th scope="col">Email</th>
                        <th>Prose</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->alamat }}</td>
                            <td>{{ $data->telepon }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="#" wire:click="edit({{ $data->id }})" class="btn btn-sm btn-info" 
                                    data-toggle="modal" data-target="#editPage">Ubah</a>
                                <a href="#" wire:click="confirm({{ $data->id }})" data-toggle="modal" data-target="#deletePage" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                          </tr> 
                        @endforeach 
                    </tbody>
                  </table>
                  {{ $member->links() }}
                </div>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPage">Tambah</a>
          </div>
        </div>
        {{-- Tambah --}}
        <div wire:ignore.self class="modal fade" id="addPage" tabindex="-1" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Member</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <from>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" wire:model="nama" value="{{ @old
                        ('nama') }}">
                        @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" wire:model="telepon" value="{{ @old
                        ('telepon') }}">
                        @error('telepon')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea wire:model='alamat' class="form-control" cols="30" rows="10">
                            {{ @old ('alamat') }}</textarea>
                        @error('alamat')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" wire:model="email" value="{{ @old
                        ('email') }}">
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  </from>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" wire:click="store" class="btn btn-primary"
                  data-dismiss="modal">Save</button>
                </div>
              </div>
            </div>
          </div>
              {{-- Edit --}}
        <div wire:ignore.self class="modal fade" id="editPage" tabindex="-1" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Member</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <from>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" wire:model="nama" value="{{ @old
                        ('nama') }}">
                        @error('nama')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" wire:model="telepon" value="{{ @old
                        ('telepon') }}">
                        @error('telepon')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea wire:model='alamat' class="form-control" cols="30" rows="10">
                            {{ @old ('alamat') }}</textarea>
                        @error('alamat')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" wire:model="email" value="{{ @old
                        ('email') }}">
                        @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                  </from>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" wire:click="store" class="btn btn-primary"
                  >Save</button>
                </div>
              </div>
            </div>
          </div>
        {{-- Delete --}}
        <div wire:ignore.self class="modal fade" id="deletePage" tabindex="-1" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Yakin Hapus Data?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" wire:click="destroy" class="btn btn-primary"
                  data-dismiss="modal">Yes</button>
                </div>
              </div>
            </div>
          </div>
