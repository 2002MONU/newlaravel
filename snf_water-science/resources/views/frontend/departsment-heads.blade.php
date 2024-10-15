@extends('frontend.layouts.app')
@section('mainwebsite')
<!-- CONTENT START -->
<div class="page-content">
    <!-- INNER PAGE BANNER -->
    <div class="wt-bnr-inr overlay-wraper" style="background-image:url(images/breadcum.jpg);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container align-items-center">
            <div class="wt-bnr-inr-entry">
                <h1 class="text-white text-center">Departmental Heads</h1>
                <ul class="wt-breadcrumb breadcrumb-style-2 text-center">
                    <li><a href="javascript:void(0);" class="text-white"><i class="fa fa-home" class="text-white"></i> Home</a></li>
                    <li class="text-white">Departmental Heads</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->


    <section>
        <div class="container mt-5">
            <div class="row">
                <!-- Tab Content -->
                <div class="col-md-12">
                    <div class="tab-content" id="tabContent">
                        <!-- HR & Administration Content -->
                        <div class="tab-pane fade show active" id="content1" role="tabpanel">
                            <!-- Search Box -->
                            <div class="row mb-3">
                                <div class="col-md-12 text-end">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search Departmental Heads...">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>S.No</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Mobile No</th>
                                            <th>Abr. No</th>
                                            <th>Ext. No</th>
                                            <th>Email ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>Department1</td>
                                            <td>Manager</td>
                                            <td>+1234567890</td>
                                            <td>123</td>
                                            <td>4567</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jane Smith</td>
                                            <td>Department2</td>
                                            <td>Developer</td>
                                            <td>+0987654321</td>
                                            <td>124</td>
                                            <td>4568</td>
                                            <td>jane@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Michael Brown</td>
                                            <td>Department3</td>
                                            <td>Designer</td>
                                            <td>+1122334455</td>
                                            <td>125</td>
                                            <td>4569</td>
                                            <td>michael@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Lisa White</td>
                                            <td>Department4</td>
                                            <td>Analyst</td>
                                            <td>+6677889900</td>
                                            <td>126</td>
                                            <td>4570</td>
                                            <td>lisa@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Paul Green</td>
                                            <td>Department5</td>
                                            <td>Consultant</td>
                                            <td>+5566778899</td>
                                            <td>127</td>
                                            <td>4571</td>
                                            <td>paul@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Emily Clark</td>
                                            <td>Department6</td>
                                            <td>Support</td>
                                            <td>+4455667788</td>
                                            <td>128</td>
                                            <td>4572</td>
                                            <td>emily@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>David Johnson</td>
                                            <td>Department7</td>
                                            <td>HR</td>
                                            <td>+3344556677</td>
                                            <td>129</td>
                                            <td>4573</td>
                                            <td>david@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Susan Adams</td>
                                            <td>Department8</td>
                                            <td>Marketing</td>
                                            <td>+2233445566</td>
                                            <td>130</td>
                                            <td>4574</td>
                                            <td>susan@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Chris Wilson</td>
                                            <td>Department9</td>
                                            <td>Sales</td>
                                            <td>+9988776655</td>
                                            <td>131</td>
                                            <td>4575</td>
                                            <td>chris@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Mary Scott</td>
                                            <td>Department10</td>
                                            <td>Finance</td>
                                            <td>+8877665544</td>
                                            <td>132</td>
                                            <td>4576</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>


                    </div>
                </div>
            </div>
        </div>

       

        <script>
            // Activate the first tab and content on load
            document.addEventListener('DOMContentLoaded', function() {
                var firstTab = new bootstrap.Tab(document.querySelector('#tabMenu .nav-link.active'));
                firstTab.show();
            });
        </script>
    </section>
@endsection