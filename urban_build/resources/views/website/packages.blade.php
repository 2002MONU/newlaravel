@extends('website.layouts.app')
@section('website')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->package_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Packages</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.php">Home</a></li>
                <li>Packages</li>
            </ul>
        </div>
    </div>
</div>
<section class="price-area-1 pt-5 pb-5" style="background-image: url(&quot;assets/images/price_bg_1.jpg&quot;);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="title-area text-center">
                    <h2 class="sec-title fw-semibold">Compare Packages</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="form-group">
                    <select id="selectpackage1" class="selectpackage1 single-select nice-select form-select" name="cars" >
                        <option value="" selected="selected" hidden>Please Choose Package...</option>
                        @foreach ($package_name as $package)
                        <option value="{{ $package->id }}" >
                            {{ $package->package_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="form-group">
                    <select name="package2" id="selectpackage2" class="selectpackage2 single-select nice-select form-select"
                            >
                        <option value="" selected="selected" hidden>Please Choose Package...</option>
                        @foreach ($package_name as $package)
                        <option value="{{ $package->id }}" >
                            {{ $package->package_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-10 col-md-12">
                <details>
                    <summary>Designs & Drawings</summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6" >
                            <div class="content dd1" >
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content dd2" >
                               
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary> Structure</summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content structure1" >
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-6 ">
                            <div class="content structure2" >
                               
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary> Kitchen   </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content Kitchen1" >
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content Kitchen2" >
                               
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary> Bathroom </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content Bathroom1">
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content Bathroom2" >
                               
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary>  Doors & Windows  </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content  DoorsWindows1" >
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content DoorsWindows2" >
                               
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary>  
                        Painting   
                    </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content Painting1">
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-6"> 
                            <div class="content Painting2">
                               
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary>    Flooring  </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content Flooring1" >
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content Flooring2" >
                                
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary>   Electrical  </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content Electrical1" >
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content Electrical2" >
                                
                            </div>
                        </div>
                    </div>
                </details>
                <details>
                    <summary>   Miscellaneous     </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content Miscellaneous1">
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content Miscellaneous2" >
                               
                            </div>
                        </div>
                    </div>
                </details>

                <details>
                    <summary>  Not Included in Packages    </summary>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-6">
                            <div class="content not_included_in_packages1" >
                                <p></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="content not_included_in_packages2" >
                                <p></p>
                            </div>
                        </div>
                    </div>
                </details>
            </div>
        </div>

    </div>
</section>

@section('js_code')
<script>
    $(document).ready(function() {

        // Event listener for selecting package 1
        $(document).on('change', '#selectpackage1', function() {
            var package1Id = $(this).val();

            if (!package1Id) {
                return;
            }

            var data1 = {
                'id': parseInt(package1Id),
            };

            getpackage1(data1);
        });

        // Event listener for selecting package 2
        $(document).on('change', '#selectpackage2', function() {
            var package2Id = $(this).val();

            if (!package2Id) {
                return;
            }

            var data2 = {
                'id': parseInt(package2Id),
            };

            getpackage2(data2);
        });

        // Function to fetch and display data for Package 1
        // Function to fetch and display data for Package 1
        function getpackage1(data) {
            $.ajax({
                type: "POST",
                url: "api/packageData", // Update this URL to match your route
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response && response.length > 0) {
                        // Clear previous content before assigning new data
                        $('.dd1, .structure1, .Kitchen1, .Bathroom1, .DoorsWindows1, .Painting1, .Flooring1, .Electrical1, .Miscellaneous1, .not_included_in_packages1')
                            .html('');

                        // Iterate over the response to dynamically assign the content
                        response.forEach(function(item) {
                            for (var key in item) {
                                if (item.hasOwnProperty(key)) {
                                    // Assign HTML content to the appropriate section
                                    if (key === 'designs_drawings') {
                                        $('.dd1').html(item[key]);
                                    } else if (key === 'structure') {
                                        $('.structure1').html(item[key]);
                                    } else if (key === 'kitchen') {
                                        $('.Kitchen1').html(item[key]);
                                    } else if (key === 'bathroom') {
                                        $('.Bathroom1').html(item[key]);
                                    } else if (key === 'doors_windows') {
                                        $('.DoorsWindows1').html(item[key]);
                                    } else if (key === 'painting') {
                                        $('.Painting1').html(item[key]);
                                    } else if (key === 'flooring') {
                                        $('.Flooring1').html(item[key]);
                                    } else if (key === 'electrical') {
                                        $('.Electrical1').html(item[key]);
                                    } else if (key === 'miscellaneous') {
                                        $('.Miscellaneous1').html(item[key]);
                                    } else if (key === 'not_included_in_packages') {
                                        $('.not_included_in_packages1').html(item[key]);
                                    }
                                }
                            }
                        });
                    } else {
                        console.log("No data found for Package 1.");
                    }
                },
                error: function(err) {
                    console.log("Error fetching Package 1 data:", err);
                }
            });
        }

        // Function to fetch and display data for Package 2
        function getpackage2(data) {
            $.ajax({
                type: "POST",
                url: "api/packageData", // Update this URL to match your route
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response && response.length > 0) {
                        // Clear previous content before assigning new data
                        $('.dd2, .structure2, .Kitchen2, .Bathroom2, .DoorsWindows2, .Painting2, .Flooring2, .Electrical2, .Miscellaneous2, .not_included_in_packages2')
                            .html('');

                        // Iterate over the response to dynamically assign the content
                        response.forEach(function(item) {
                            for (var key in item) {
                                if (item.hasOwnProperty(key)) {
                                    // Assign HTML content to the appropriate section
                                    if (key === 'designs_drawings') {
                                        $('.dd2').html(item[key]);
                                    } else if (key === 'structure') {
                                        $('.structure2').html(item[key]);
                                    } else if (key === 'kitchen') {
                                        $('.Kitchen2').html(item[key]);
                                    } else if (key === 'bathroom') {
                                        $('.Bathroom2').html(item[key]);
                                    } else if (key === 'doors_windows') {
                                        $('.DoorsWindows2').html(item[key]);
                                    } else if (key === 'painting') {
                                        $('.Painting2').html(item[key]);
                                    } else if (key === 'flooring') {
                                        $('.Flooring2').html(item[key]);
                                    } else if (key === 'electrical') {
                                        $('.Electrical2').html(item[key]);
                                    } else if (key === 'miscellaneous') {
                                        $('.Miscellaneous2').html(item[key]);
                                    } else if (key === 'not_included_in_packages') {
                                        $('.not_included_in_packages2').html(item[key]);
                                    }
                                }
                            }
                        });
                    } else {
                        console.log("No data found for Package 2.");
                    }
                },
                error: function(err) {
                    console.log("Error fetching Package 2 data:", err);
                }
            });
        }

    });
</script>
@endsection
@endsection