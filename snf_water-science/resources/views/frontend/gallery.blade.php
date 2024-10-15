@extends('frontend.layouts.app')
@section('mainwebsite')

<!-- CONTENT START -->
<div class="page-content">
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/breadcum.jpg);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container align-items-center">
            <div class="wt-bnr-inr-entry">
                <h1 class="text-white text-center">EHS</h1>
                <ul class="wt-breadcrumb breadcrumb-style-2 text-center">
                    <li><a href="javascript:void(0);" class="text-white"><i class="fa fa-home"></i> Home</a></li>
                    <li class="text-white">EHS</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <section class="my-gallery-section py-5">
        <div class="container">
            <div class="row text-center">
                <!-- Loop through each gallery -->
                @foreach ($galleries as $gallery)
                @php
                    // Decode the image field for each gallery item
                    $images = json_decode($gallery->image, true);
                @endphp

                <!-- Check if images array is not empty -->
                @if (is_array($images) && !empty($images))
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="my-gallery-card" data-bs-toggle="modal" data-bs-target="#galleryModal" data-gallery-id="{{ $gallery->id }}">
                        <!-- Display the first image from the images array -->
                        <img src="{{ asset('admin/galleryImage/' . $images[0]) }}" class="img-fluid rounded" alt="{{ $gallery->title }}">
                        <h3 class="gallery-heading mt-3">{{ $gallery->title }}</h3>
                    </div>
                </div>
                @else
                <!-- Fallback if no images available -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="my-gallery-card" data-bs-toggle="modal" data-bs-target="#galleryModal" data-gallery-id="{{ $gallery->id }}">
                        <img src="{{ asset('admin/galleryImage/default.jpg') }}" class="img-fluid rounded" alt="No Image">
                        <h3 class="gallery-heading mt-3">{{ $gallery->title }}</h3>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <!-- Modal to display images of the clicked gallery -->
        <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalLabel">Gallery Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="galleryImagesContainer">
                            <!-- Dynamic images will be loaded here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full Image Modal -->
        <div class="modal fade" id="fullImageModal" tabindex="-1" aria-labelledby="fullImageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fullImageModalLabel">Full Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="" class="img-fluid" id="fullImageDisplay" alt="Full Size Image">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" id="prevImage">Prev</button>
                        <button type="button" class="btn btn-secondary" id="nextImage">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentImageIndex = 0;
            let currentGalleryImages = [];

            const fullImageModal = new bootstrap.Modal(document.getElementById('fullImageModal'));
            const fullImageDisplay = document.getElementById('fullImageDisplay');
            const galleryImagesContainer = document.getElementById('galleryImagesContainer');

            // Event listener for gallery card click
            document.querySelectorAll('.my-gallery-card').forEach(function(card) {
                card.addEventListener('click', function() {
                    const galleryId = this.getAttribute('data-gallery-id');

                    // Make an AJAX request to fetch gallery images
                    fetchGalleryImages(galleryId);
                });
            });

            // Fetch gallery images dynamically
            function fetchGalleryImages(galleryId) {
                fetch(`/gallery/${galleryId}/images`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);  // For debugging: log fetched data
                        currentGalleryImages = data.images;
                        displayGalleryImages(currentGalleryImages);
                    })
                    .catch(error => console.error('Error fetching images:', error));
            }

            // Display gallery images in the modal
            function displayGalleryImages(images) {
                galleryImagesContainer.innerHTML = '';
                images.forEach((image, index) => {
                    const imageElement = document.createElement('div');
                    imageElement.classList.add('col-md-3', 'mb-3');
                    const imagePath = `/admin/galleryImage/${image}`;
                    imageElement.innerHTML = `<img src="${imagePath}" class="img-fluid img-thumbnail my-grid-image" data-full-image="${imagePath}" alt="Image ${index + 1}">`;
                    galleryImagesContainer.appendChild(imageElement);

                    // Add click event to open full image modal
                    imageElement.querySelector('img').addEventListener('click', function() {
                        currentImageIndex = index;
                        fullImageDisplay.src = this.getAttribute('data-full-image');
                        fullImageModal.show();
                    });
                });
            }

            // Navigate to previous image
            document.getElementById('prevImage').addEventListener('click', function() {
                currentImageIndex = (currentImageIndex - 1 + currentGalleryImages.length) % currentGalleryImages.length;
                fullImageDisplay.src = `/admin/galleryImage/${currentGalleryImages[currentImageIndex]}`;
            });

            // Navigate to next image
            document.getElementById('nextImage').addEventListener('click', function() {
                currentImageIndex = (currentImageIndex + 1) % currentGalleryImages.length;
                fullImageDisplay.src = `/admin/galleryImage/${currentGalleryImages[currentImageIndex]}`;
            });
        });
    </script>
@endsection
