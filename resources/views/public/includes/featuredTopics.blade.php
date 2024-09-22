   <section class="featured-section">
       <div class="container">
           <div class="row justify-content-center">
               @foreach ($topics as $key => $topic)
                   @if ($loop->first)
                       <div class="col-lg-4 col-12 mb-4 mb-lg-0">

                           <div class="custom-block bg-white shadow-lg">
                               <a href="{{ route('topicDetails', $topic->id) }}">
                                   <div class="d-flex">
                                       <div>
                                           <h5 class="mb-2">{{ $topic->title }}</h5>

                                           <p class="mb-0">{{ $topic->content }}</p>
                                       </div>

                                       <span class="badge bg-design rounded-pill ms-auto">{{ $topic->views }}</span>
                                   </div>

                                   <img src="{{ asset('assets/admin/images/topics/' . $topic->image) }}"
                                       class="custom-block-image img-fluid" alt="{{ $topic->title }}">
                               </a>
                           </div>

                       </div>
                   @else
                       <div class="col-lg-6 col-12">
                           <div class="custom-block custom-block-overlay">
                               <div class="d-flex flex-column h-100">
                                   <img src="{{ asset('assets/images/businesswoman-using-tablet-analysis.jpg') }}"
                                       class="custom-block-image img-fluid" alt="businesswoman-using-table">
                                   <div class="custom-block-overlay-text d-flex">
                                       <div>
                                           <h5 class="text-white mb-2">{{ $topic->title }}</h5>
                                           <p class="text-white">{{ $topic->content }}</p>
                                           <a href="{{ route('topicDetails', $topic->id) }}"
                                               class="btn custom-btn mt-2 mt-lg-3">Learn
                                               More</a>
                                       </div>
                                       <span class="badge bg-finance rounded-pill ms-auto">{{ $topic->views }}</span>
                                   </div>

                                   <div class="social-share d-flex">
                                       <p class="text-white me-4">Share:</p>
                                       <ul class="social-icon">
                                           <li class="social-icon-item"><a href="#"
                                                   class="social-icon-link bi-twitter"></a></li>
                                           <li class="social-icon-item"><a href="#"
                                                   class="social-icon-link bi-facebook"></a></li>
                                           <li class="social-icon-item"><a href="#"
                                                   class="social-icon-link bi-pinterest"></a></li>
                                       </ul>

                                   </div>

                                   <div class="section-overlay"></div>
                               </div>
                           </div>
                       </div>
                   @endif
               @endforeach
           </div>
       </div>
   </section>
