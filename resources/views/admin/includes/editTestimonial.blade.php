  <div class="container my-5">
      <div class="mx-2">
          <h2 class="fw-bold fs-2 mb-5 pb-2">Edit Testimonial</h2>
          <form action="{{ route('testimonial.update', $testimonial['id']) }}" method="post" enctype="multipart/form-data"
              class="px-md-5">
              @csrf
              @method('put')
              <div class="form-group mb-3 row">
                  <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
                  <div class="col-md-10">
                      <input type="text" placeholder="e.g. Jhon Doe" name="name"
                          value="{{ old('name', $testimonial['name']) }}" class="form-control py-2" />
                      @error('name')
                          <div class="alert alert-warning">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
              <div class="form-group mb-3 row">
                  <label for="" class="form-label col-md-2 fw-bold text-md-end">Content:</label>
                  <div class="col-md-10">
                      <textarea name="content" id="" rows="5" class="form-control">{{ old('content', $testimonial['content']) }}</textarea>
                      @error('content')
                          <div class="alert alert-warning">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
              <div class="form-group mb-3 row">
                  <label for="" class="form-label col-md-2 fw-bold text-md-end">Published:</label>
                  <div class="col-md-10">
                      <input type="hidden" name="published" value="0" />
                      <input type="checkbox" name="published" value="1" class="form-check-input"
                          @checked(old('published', $testimonial['published'])) style="padding: 0.7rem;" />
                  </div>
              </div>
              <hr>
              <div class="form-group mb-3 row">
                  <label for="" class="form-label col-md-2 fw-bold text-md-end">Image:</label>
                  <div class="col-md-10">
                      <input type="file" class="form-control" name="image"
                          style="padding: 0.7rem; margin-bottom: 10px;" />
                      @if ($testimonial->image)
                          <img src="{{ asset('assets/admin/images/testimonials/' . $testimonial->image) }}"
                              alt="testimonial_image" name="image" style="width: 10rem;">
                      @endif
                      @error('image')
                          <div class="alert alert-warning">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
              <div class="text-md-end">
                  <button type="submit" class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
                      Edit Testimonial
                  </button>
              </div>
          </form>
      </div>
  </div>
  </main>
