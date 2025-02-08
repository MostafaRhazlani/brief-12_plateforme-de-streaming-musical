<?php
    $categories = new CategoryController;
    $getAllCategories = $categories->getAllCategories();
    
    $songs = new SongController;
    $songs->createSong();

    $getAllSongs = $songs->getAllSongs();
?>    
    
    
    <main class="main-content">
        <?php require_once __DIR__ . '/../layout/navbar.php' ?>
        <div class="content-inner container-fluid pb-0" id="page_layout">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <h4 class="mb-0">Music List</h4>
                                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvassong" aria-controls="offcanvassong">+ Add New Song</button>
                            </div>
                        </div>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvassong" aria-labelledby="offcanvassongLabel">
                            <div class="offcanvas-header">
                                <h4 id="offcanvassongLabel">Add Song</h4>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <form action="?page=artist/songs" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="esongname" class="form-label">Song Name:</label>
                                        <input type="text" name="nameSong" class="form-control" id="exampleFormControlInput1" placeholder="Enter name of song here">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customFile1" class="form-label custom-file-input">Song Image:</label>
                                        <input class="form-control" name="imageSong" type="file" id="customFile1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customFile2" class="form-label custom-file-input">Song:</label>
                                        <input class="form-control" name="song" type="file" id="customFile2">
                                    </div>
                                    <div class="mb-3">
                                        <label>Song Category:</label>
                                        <select name="idCategory" class="form-select" aria-label="exampleone">
                                            <option selected="" disabled="">Song Category</option>
                                            <?php foreach($getAllCategories as $category): ?>
                                                <option value="<?php echo $category['idcategory'] ?>"><?php echo $category['namecategory'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body px-0">
                            <div class="table-data-top table-responsive">
                                <table class="table mb-0" id="datatable" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Song Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Singer</th>
                                            <th scope="col">Listener</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $index = 0; foreach($getAllSongs as $song) : ?>
                                            <tr>
                                                <td><?php echo $index += 1; ?></td>
                                                <td>
                                                    <audio class="visually-hidden" id="song_<?php echo $song['idsong'] ?>" controls>
                                                        <source src="/public/songs/<?php echo $song['song'] ?>" type="audio/ogg">
                                                        <source src="horse.mp3" type="audio/mpeg">
                                                        Your browser does not support the audio tag.
                                                    </audio>
                                                    <img id="image" src="/public/images/songsImage/<?php echo $song['imagesong'] ?>" class="img-fluid avatar-50 rounded-3" alt="data-table-image" />
                                                </td>
                                                <td><?php echo $song['namesong'] ?></td>
                                                <td><?php echo $song['namecategory'] ?></td>
                                                <td><?php echo $song['fullname'] ?></td>
                                                <td>4.6k</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <a class="btn btn-soft-primary btn-icon btn-sm rounded-pill ms-2" href="#"
                                                            role="button">
                                                            <span class="btn-inner">
                                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.4"
                                                                        d="M19.9927 18.9534H14.2984C13.7429 18.9534 13.291 19.4124 13.291 19.9767C13.291 20.5422 13.7429 21.0001 14.2984 21.0001H19.9927C20.5483 21.0001 21.0001 20.5422 21.0001 19.9767C21.0001 19.4124 20.5483 18.9534 19.9927 18.9534Z"
                                                                        fill="currentColor"></path>
                                                                    <path
                                                                        d="M10.309 6.90385L15.7049 11.2639C15.835 11.3682 15.8573 11.5596 15.7557 11.6929L9.35874 20.0282C8.95662 20.5431 8.36402 20.8344 7.72908 20.8452L4.23696 20.8882C4.05071 20.8903 3.88775 20.7613 3.84542 20.5764L3.05175 17.1258C2.91419 16.4915 3.05175 15.8358 3.45388 15.3306L9.88256 6.95545C9.98627 6.82108 10.1778 6.79743 10.309 6.90385Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.4"
                                                                        d="M18.1208 8.66544L17.0806 9.96401C16.9758 10.0962 16.7874 10.1177 16.6573 10.0124C15.3927 8.98901 12.1545 6.36285 11.2561 5.63509C11.1249 5.52759 11.1069 5.33625 11.2127 5.20295L12.2159 3.95706C13.126 2.78534 14.7133 2.67784 15.9938 3.69906L17.4647 4.87078C18.0679 5.34377 18.47 5.96726 18.6076 6.62299C18.7663 7.3443 18.597 8.0527 18.1208 8.66544Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-soft-primary btn-icon btn-sm rounded-pill ms-2" href="#"
                                                            role="button">
                                                            <span class="btn-inner">
                                                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.4"
                                                                        d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z"
                                                                        fill="currentColor"></path>
                                                                    <path
                                                                        d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border-top mb-0">
                        <diiv class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-md-row flex-column gap-3">
                                <div class="">
                                    <ul class="list-unstyled p-0 m-0 mb-3 text-capitalize d-flex gap-3 flex-md-nowrap flex-wrap">
                                        <li>about</li>
                                        <li>|</li>
                                        <li>terms of use</li>
                                        <li>|</li>
                                        <li>privacy policy</li>
                                        <li>|</li>
                                        <li>support</li>
                                        <li>|</li>
                                        <li>feedback</li>
                                        <li>|</li>
                                    </ul>
                                    <small>Copyright <span id="copyright">
                                            <script>
                                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                            </script>
                                        </span>. Made with love by Iqonic Design.</small>
                                </div>
                                <div>
                                    <ul class="list-unstyled m-0 p-0 d-flex align-items-center gap-3">
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M5.026 15C11.064 15 14.367 9.99702 14.367 5.66602C14.367 5.52602 14.367 5.38402 14.361 5.24402C15.0041 4.77851 15.5591 4.20217 16 3.54202C15.3993 3.80687 14.7628 3.98143 14.111 4.06002C14.7975 3.64966 15.3117 3.00399 15.558 2.24302C14.913 2.62515 14.207 2.8934 13.471 3.03602C12.9762 2.50905 12.3214 2.15994 11.6081 2.04278C10.8948 1.92562 10.1627 2.04694 9.52534 2.38796C8.88796 2.72897 8.38081 3.27065 8.08245 3.92908C7.78409 4.58751 7.71118 5.32595 7.875 6.03002C6.56974 5.96457 5.29282 5.62549 4.12704 5.03476C2.96127 4.44404 1.93268 3.61487 1.108 2.60102C0.68934 3.3241 0.561574 4.17942 0.750646 4.99329C0.939718 5.80715 1.43145 6.51855 2.126 6.98302C1.60554 6.96534 1.09652 6.82558 0.64 6.57502V6.62002C0.640897 7.3775 0.903307 8.11144 1.38287 8.69778C1.86244 9.28412 2.52975 9.68689 3.272 9.83802C2.99026 9.91564 2.69923 9.95433 2.407 9.95302C2.20098 9.95365 1.99538 9.93456 1.793 9.89602C2.00279 10.5481 2.41127 11.1182 2.96125 11.5265C3.51122 11.9348 4.17513 12.1609 4.86 12.173C3.69656 13.0868 2.2594 13.5824 0.78 13.58C0.519321 13.5811 0.258823 13.5661 0 13.535C1.50151 14.4923 3.2453 15.0006 5.026 15Z" fill="#4A525F" />
                                            </svg>
                                        </li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_389_2574)">
                                                    <path d="M0 1.146C0 0.513 0.526 0 1.175 0H14.825C15.474 0 16 0.513 16 1.146V14.854C16 15.487 15.474 16 14.825 16H1.175C0.526 16 0 15.487 0 14.854V1.146ZM4.943 13.394V6.169H2.542V13.394H4.943ZM3.743 5.182C4.58 5.182 5.101 4.628 5.101 3.934C5.086 3.225 4.581 2.686 3.759 2.686C2.937 2.686 2.4 3.226 2.4 3.934C2.4 4.628 2.921 5.182 3.727 5.182H3.743ZM8.651 13.394V9.359C8.651 9.143 8.667 8.927 8.731 8.773C8.904 8.342 9.299 7.895 9.963 7.895C10.832 7.895 11.179 8.557 11.179 9.529V13.394H13.58V9.25C13.58 7.03 12.396 5.998 10.816 5.998C9.542 5.998 8.971 6.698 8.651 7.191V7.216H8.635C8.64031 7.20765 8.64564 7.19932 8.651 7.191V6.169H6.251C6.281 6.847 6.251 13.394 6.251 13.394H8.651Z" fill="#4A525F" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_389_2574">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_389_2576)">
                                                    <path d="M16 8.04902C16 3.60302 12.418 -0.000976562 8.00005 -0.000976562C3.58005 2.34375e-05 -0.00195312 3.60302 -0.00195312 8.05002C-0.00195312 12.067 2.92405 15.397 6.74805 16.001V10.376H4.71805V8.05002H6.75005V6.27502C6.75005 4.25802 7.94505 3.14402 9.77205 3.14402C10.648 3.14402 11.563 3.30102 11.563 3.30102V5.28102H10.554C9.56105 5.28102 9.25105 5.90202 9.25105 6.53902V8.04902H11.469L11.115 10.375H9.25005V16C13.074 15.396 16 12.066 16 8.04902Z" fill="#FF4545" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_389_2576">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </li>
                                        <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_389_2578)">
                                                    <path d="M8 0C5.829 0 5.556 0.01 4.703 0.048C3.85 0.088 3.269 0.222 2.76 0.42C2.22609 0.620819 1.74249 0.935826 1.343 1.343C0.936076 1.7427 0.621107 2.22624 0.42 2.76C0.222 3.268 0.087 3.85 0.048 4.7C0.01 5.555 0 5.827 0 8.001C0 10.173 0.01 10.445 0.048 11.298C0.088 12.15 0.222 12.731 0.42 13.24C0.625 13.766 0.898 14.212 1.343 14.657C1.787 15.102 2.233 15.376 2.759 15.58C3.269 15.778 3.849 15.913 4.701 15.952C5.555 15.99 5.827 16 8 16C10.173 16 10.444 15.99 11.298 15.952C12.149 15.912 12.732 15.778 13.241 15.58C13.7746 15.3791 14.2578 15.0641 14.657 14.657C15.102 14.212 15.375 13.766 15.58 13.24C15.777 12.731 15.912 12.15 15.952 11.298C15.99 10.445 16 10.173 16 8C16 5.827 15.99 5.555 15.952 4.701C15.912 3.85 15.777 3.268 15.58 2.76C15.3789 2.22623 15.0639 1.74268 14.657 1.343C14.2576 0.935676 13.774 0.620645 13.24 0.42C12.73 0.222 12.148 0.087 11.297 0.048C10.443 0.01 10.172 0 7.998 0H8.001H8ZM7.283 1.442H8.001C10.137 1.442 10.39 1.449 11.233 1.488C12.013 1.523 12.437 1.654 12.719 1.763C13.092 1.908 13.359 2.082 13.639 2.362C13.919 2.642 14.092 2.908 14.237 3.282C14.347 3.563 14.477 3.987 14.512 4.767C14.551 5.61 14.559 5.863 14.559 7.998C14.559 10.133 14.551 10.387 14.512 11.23C14.477 12.01 14.346 12.433 14.237 12.715C14.1087 13.0624 13.904 13.3764 13.638 13.634C13.358 13.914 13.092 14.087 12.718 14.232C12.438 14.342 12.014 14.472 11.233 14.508C10.39 14.546 10.137 14.555 8.001 14.555C5.865 14.555 5.611 14.546 4.768 14.508C3.988 14.472 3.565 14.342 3.283 14.232C2.9355 14.1039 2.62113 13.8996 2.363 13.634C2.09675 13.376 1.89172 13.0617 1.763 12.714C1.654 12.433 1.523 12.009 1.488 11.229C1.45 10.386 1.442 10.133 1.442 7.996C1.442 5.86 1.45 5.608 1.488 4.765C1.524 3.985 1.654 3.561 1.764 3.279C1.909 2.906 2.083 2.639 2.363 2.359C2.643 2.079 2.909 1.906 3.283 1.761C3.565 1.651 3.988 1.521 4.768 1.485C5.506 1.451 5.792 1.441 7.283 1.44V1.442ZM12.271 2.77C12.1449 2.77 12.0201 2.79483 11.9036 2.84308C11.7872 2.89132 11.6813 2.96203 11.5922 3.05118C11.503 3.14032 11.4323 3.24615 11.3841 3.36262C11.3358 3.4791 11.311 3.60393 11.311 3.73C11.311 3.85607 11.3358 3.9809 11.3841 4.09738C11.4323 4.21385 11.503 4.31968 11.5922 4.40882C11.6813 4.49797 11.7872 4.56868 11.9036 4.61692C12.0201 4.66517 12.1449 4.69 12.271 4.69C12.5256 4.69 12.7698 4.58886 12.9498 4.40882C13.1299 4.22879 13.231 3.98461 13.231 3.73C13.231 3.47539 13.1299 3.23121 12.9498 3.05118C12.7698 2.87114 12.5256 2.77 12.271 2.77ZM8.001 3.892C7.45607 3.8835 6.91489 3.98349 6.40898 4.18614C5.90306 4.3888 5.44251 4.69007 5.05415 5.07242C4.66579 5.45478 4.35736 5.91057 4.14684 6.41326C3.93632 6.91595 3.8279 7.4555 3.8279 8.0005C3.8279 8.5455 3.93632 9.08505 4.14684 9.58774C4.35736 10.0904 4.66579 10.5462 5.05415 10.9286C5.44251 11.3109 5.90306 11.6122 6.40898 11.8149C6.91489 12.0175 7.45607 12.1175 8.001 12.109C9.07954 12.0922 10.1082 11.6519 10.865 10.8833C11.6217 10.1146 12.0459 9.07917 12.0459 8.0005C12.0459 6.92183 11.6217 5.88641 10.865 5.11775C10.1082 4.34909 9.07954 3.90883 8.001 3.892ZM8.001 5.333C8.70833 5.333 9.38669 5.61399 9.88685 6.11415C10.387 6.61431 10.668 7.29267 10.668 8C10.668 8.70733 10.387 9.38569 9.88685 9.88585C9.38669 10.386 8.70833 10.667 8.001 10.667C7.29367 10.667 6.61531 10.386 6.11515 9.88585C5.61499 9.38569 5.334 8.70733 5.334 8C5.334 7.29267 5.61499 6.61431 6.11515 6.11415C6.61531 5.61399 7.29367 5.333 8.001 5.333Z" fill="#4A525F" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_389_2578">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </diiv>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!--Footer Start-->
    <!-- Footer Section Start -->
    <footer class="footer">
        <div class="footer-top">
            <div class="row">
                <div class="col-12">
                    <input type="range" min="1" max="100" value="0" class="seek_slider" onchange="seekTo()">
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container-fluid px-4">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-md-4 col-sm-6">
                        <div class="details">
                            <div class="footer-track-detail d-flex align-items-center gap-3 flex-wrap justify-content-sm-start justify-content-center">
                                <div class="track-art"></div>
                                <div>
                                    <h6 class="track-name text-white font-size-14 mb-1"></h6>
                                    <p class="track-artist text-white small m-0"></p>
                                </div>
                                <div class="like text-white flex-shrink-0 ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <g>
                                            <path
                                                d="M9 15.1875C9 15.1875 1.6875 11.25 1.6875 6.60938C1.6875 5.60238 2.08753 4.63663 2.79958 3.92458C3.51163 3.21253 4.47738 2.8125 5.48438 2.8125C7.07273 2.8125 8.43328 3.67805 9 5.0625C9.56672 3.67805 10.9273 2.8125 12.5156 2.8125C13.5226 2.8125 14.4884 3.21253 15.2004 3.92458C15.9125 4.63663 16.3125 5.60238 16.3125 6.60938C16.3125 11.25 9 15.1875 9 15.1875Z"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath>
                                                <rect width="18" height="18" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-3 col-sm-6 mt-sm-0 mt-3">
                        <div class="d-flex align-items-center justify-content-md-center justify-content-sm-end justify-content-center gap-3">
                            <div class="track-suffle text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                                    <g>
                                        <path
                                            d="M6.67969 6.358L5.69109 5.36941C5.30132 4.97784 4.83776 4.66747 4.32723 4.45626C3.81671 4.24505 3.26936 4.13719 2.71687 4.13894H0.849022C0.625246 4.13894 0.410634 4.22783 0.252401 4.38607C0.0941667 4.5443 0.00527191 4.75891 0.00527191 4.98269C0.00527191 5.20646 0.0941667 5.42107 0.252401 5.57931C0.410634 5.73754 0.625246 5.82644 0.849022 5.82644H2.71512C3.04606 5.82554 3.3739 5.89033 3.67962 6.01706C3.98535 6.14379 4.26288 6.32994 4.49613 6.56472L5.48437 7.5512C5.6426 7.70971 5.85732 7.79887 6.08128 7.79907C6.30525 7.79927 6.52012 7.71049 6.67863 7.55226C6.83714 7.39403 6.9263 7.17931 6.9265 6.95535C6.9267 6.73138 6.83791 6.51651 6.67969 6.358Z"
                                            fill="currentColor" />
                                        <path
                                            d="M5.68336 12.6299L11.7506 6.56259C11.9839 6.32784 12.2614 6.14172 12.5672 6.01499C12.8729 5.88826 13.2007 5.82345 13.5316 5.82431H15.1281L14.1529 6.79954C14.0742 6.87793 14.0118 6.97107 13.9692 7.07363C13.9266 7.17619 13.9047 7.28615 13.9047 7.3972C13.9047 7.50825 13.9266 7.61821 13.9692 7.72076C14.0118 7.82332 14.0742 7.91647 14.1529 7.99486C14.3111 8.15308 14.5257 8.24196 14.7495 8.24196C14.9732 8.24196 15.1878 8.15308 15.3461 7.99486L17.7465 5.59579C17.8271 5.51525 17.8911 5.41961 17.9347 5.31435C17.9783 5.20909 18.0008 5.09626 18.0008 4.98232C18.0008 4.86837 17.9783 4.75555 17.9347 4.65028C17.8911 4.54502 17.8271 4.44938 17.7465 4.36884L15.3461 1.96872C15.1898 1.81251 14.9785 1.72382 14.7576 1.72172C14.5366 1.71961 14.3237 1.80426 14.1645 1.95747C13.8234 2.28548 13.8315 2.84095 14.1662 3.17564L15.127 4.13646H13.5316C12.9792 4.13475 12.4318 4.24263 11.9213 4.45383C11.4108 4.66504 10.9472 4.97539 10.5574 5.36693L4.49016 11.4363C4.2569 11.6711 3.97937 11.8572 3.67365 11.984C3.36792 12.1107 3.04009 12.1755 2.70914 12.1746H0.84375C0.619974 12.1746 0.405362 12.2635 0.247129 12.4217C0.0888948 12.5799 0 12.7946 0 13.0183C0 13.2421 0.0888948 13.4567 0.247129 13.615C0.405362 13.7732 0.619974 13.8621 0.84375 13.8621H2.70914C3.26174 13.8635 3.80913 13.7553 4.31965 13.5438C4.83016 13.3323 5.29367 13.0217 5.68336 12.6299Z"
                                            fill="currentColor" />
                                        <path
                                            d="M15.3461 16.0311L17.7465 13.6317C17.8271 13.5512 17.891 13.4556 17.9347 13.3504C17.9783 13.2451 18.0007 13.1323 18.0007 13.0184C18.0007 12.9045 17.9783 12.7917 17.9347 12.6865C17.891 12.5812 17.8271 12.4856 17.7465 12.4051L15.3461 10.0053C15.1898 9.84913 14.9785 9.76044 14.7576 9.75834C14.5366 9.75624 14.3237 9.84088 14.1645 9.99409C13.8234 10.3221 13.8315 10.8776 14.1662 11.2123L15.127 12.1731H13.5376C13.2067 12.1739 12.8789 12.1091 12.5731 11.9824C12.2674 11.8557 11.9899 11.6695 11.7566 11.4348L10.6625 10.3407C10.5844 10.2613 10.4914 10.1982 10.3887 10.1549C10.2861 10.1117 10.1759 10.0892 10.0645 10.0887C9.95314 10.0883 9.84277 10.1099 9.73978 10.1523C9.63679 10.1947 9.54322 10.2571 9.46446 10.3359C9.3857 10.4146 9.32331 10.5082 9.2809 10.6112C9.23849 10.7142 9.21688 10.8245 9.21734 10.9359C9.21779 11.0473 9.24029 11.1575 9.28354 11.2601C9.32679 11.3628 9.38994 11.4558 9.46934 11.5339L10.5634 12.6284C10.9533 13.0198 11.4168 13.3301 11.9273 13.5413C12.4378 13.7525 12.9852 13.8604 13.5376 13.8588H15.1277L14.1529 14.8358C13.9946 14.994 13.9057 15.2086 13.9057 15.4324C13.9057 15.6562 13.9946 15.8708 14.1529 16.029C14.3108 16.1875 14.5253 16.2768 14.749 16.2772C14.9728 16.2776 15.1875 16.1891 15.3461 16.0311Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath>
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="prev-track text-white" onclick="prevTrack()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <g>
                                        <path
                                            d="M13 2.9925V13.0075C12.9981 13.1848 12.9492 13.3584 12.8581 13.5105C12.767 13.6627 12.6372 13.7879 12.4818 13.8733C12.3264 13.9587 12.1511 14.0013 11.9739 13.9966C11.7966 13.992 11.6238 13.9403 11.4731 13.8469L4 9.17313V13.5C4 13.6326 3.94732 13.7598 3.85355 13.8536C3.75979 13.9473 3.63261 14 3.5 14C3.36739 14 3.24021 13.9473 3.14645 13.8536C3.05268 13.7598 3 13.6326 3 13.5V2.5C3 2.36739 3.05268 2.24021 3.14645 2.14645C3.24021 2.05268 3.36739 2 3.5 2C3.63261 2 3.75979 2.05268 3.85355 2.14645C3.94732 2.24021 4 2.36739 4 2.5V6.82688L11.4731 2.15313C11.6236 2.05865 11.7966 2.00612 11.9743 2.00097C12.1519 1.99582 12.3277 2.03825 12.4834 2.12385C12.6391 2.20946 12.7691 2.33513 12.8599 2.48785C12.9508 2.64058 12.9991 2.81481 13 2.9925Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath>
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="playpause-track" onclick="playpauseTrack()">
                                <span class="d-inline-block rounded-circle p-2 bg-primary text-white">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M16.6308 13.131C16.5743 13.189 16.3609 13.437 16.1622 13.641C14.9971 14.924 11.9576 17.024 10.3668 17.665C10.1252 17.768 9.51437 17.986 9.18802 18C8.8753 18 8.5772 17.928 8.29274 17.782C7.93814 17.578 7.65368 17.257 7.49781 16.878C7.39747 16.615 7.2416 15.828 7.2416 15.814C7.08573 14.953 7 13.554 7 12.008C7 10.535 7.08573 9.193 7.21335 8.319C7.22796 8.305 7.38383 7.327 7.55431 6.992C7.86702 6.38 8.47784 6 9.13151 6H9.18802C9.61374 6.015 10.509 6.395 10.509 6.409C12.0141 7.051 14.9834 9.048 16.1768 10.375C16.1768 10.375 16.5129 10.716 16.659 10.929C16.887 11.235 17 11.614 17 11.993C17 12.416 16.8724 12.81 16.6308 13.131Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            <div class="next-track text-white" onclick="nextTrack()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <g>
                                        <path
                                            d="M13 2.5V13.5C13 13.6326 12.9473 13.7598 12.8536 13.8536C12.7598 13.9473 12.6326 14 12.5 14C12.3674 14 12.2402 13.9473 12.1464 13.8536C12.0527 13.7598 12 13.6326 12 13.5V9.17313L4.52688 13.8469C4.37638 13.9414 4.20336 13.9939 4.02574 13.999C3.84811 14.0042 3.67235 13.9618 3.51663 13.8761C3.36091 13.7905 3.23091 13.6649 3.14007 13.5121C3.04924 13.3594 3.00088 13.1852 3 13.0075V2.9925C3.00088 2.81481 3.04924 2.64058 3.14007 2.48785C3.23091 2.33513 3.36091 2.20946 3.51663 2.12385C3.67235 2.03825 3.84811 1.99582 4.02574 2.00097C4.20336 2.00612 4.37638 2.05865 4.52688 2.15313L12 6.82688V2.5C12 2.36739 12.0527 2.24021 12.1464 2.14645C12.2402 2.05268 12.3674 2 12.5 2C12.6326 2 12.7598 2.05268 12.8536 2.14645C12.9473 2.24021 13 2.36739 13 2.5Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath>
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="track-replay text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <g>
                                        <path
                                            d="M15.3762 9.55705C15.6487 7.4768 15.0562 5.53405 13.909 4.0368C13.7607 3.8433 13.4937 3.78655 13.2827 3.90855L12.2672 4.49555C12.009 4.6448 11.9535 4.98655 12.141 5.2188C13.0152 6.30055 13.4742 7.7303 13.2757 9.26405C12.965 11.6633 11.0062 13.5823 8.60125 13.8473C5.397 14.2001 2.678 11.6906 2.678 8.5568C2.678 5.6228 5.064 3.23505 7.99975 3.23505V3.86855C7.99975 4.23805 8.3995 4.4688 8.7195 4.28405L11.6535 2.59005C11.9732 2.4053 11.9732 1.9438 11.6535 1.75905L8.71975 0.0650508C8.4 -0.119699 8 0.111051 8 0.480551V1.11455C3.89675 1.11455 0.557999 4.45305 0.557999 8.55655C0.557999 12.9438 4.37125 16.4553 8.85575 15.9518C12.2132 15.5753 14.9377 12.9066 15.3762 9.55705Z"
                                            fill="currentColor" />
                                    </g>
                                    <defs>
                                        <clipPath>
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-5 mt-md-0 mt-3">
                        <div class="row align-items-center gx-xl-5 justify-content-md-end justify-content-center">
                            <div class="col-lg-2 d-lg-block d-none"></div>
                            <div class="col-lg-4 col-md-5 col-sm-4 col-4">
                                <div class="track-volumne d-flex align-items-center justify-content-md-end justify-content-sm-start justify-content-center">
                                    <div class="flex-shrink-0 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none">
                                            <g>
                                                <path
                                                    d="M6.25 13.125H2.5C2.33424 13.125 2.17527 13.0592 2.05806 12.9419C1.94085 12.8247 1.875 12.6658 1.875 12.5V7.5C1.875 7.33424 1.94085 7.17527 2.05806 7.05806C2.17527 6.94085 2.33424 6.875 2.5 6.875H6.25L11.875 2.5V17.5L6.25 13.125Z"
                                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M15 8.125V11.875" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath>
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <input type="range" min="1" max="100" value="99" class="volume_slider"
                                        onchange="setVolume()">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-4 col-5">
                                <div class="track-time text-center">
                                    <span class="current-time text-white small">00:00</span>
                                    <span class="mx-1 text-white">
                                        <svg width="6" height="16" viewBox="0 0 4 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.73047 0.392578H3.62109L0.890625 9H0L2.73047 0.392578Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <span class="total-duration text-white small">00:00</span>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-3">
                                <ul class="list-unstyled m-0 p-0 d-flex align-items-center justify-content-sm-end justify-content-center">
                                    <li>
                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none">
                                            <g>
                                                <path d="M3.125 5H16.875" stroke="#AAAAAA" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M3.125 10H10.625" stroke="#AAAAAA" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M3.125 15H10.625" stroke="#AAAAAA" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M18.75 12.5L13.75 15.625V9.375L18.75 12.5Z" stroke="#AAAAAA"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath>
                                                    <rect width="20" height="20" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </li>
                                    <li class="nav-item iq-full-screen d-none d-xl-block ms-3" id="fullscreen-item">
                                        <a href="#" class="nav-link" id="btnFullscreen" data-bs-toggle="dropdown">
                                            <span class="btn-inner">
                                                <svg class="normal-screen icon-24" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.5528 5.99656L13.8595 10.8961" stroke="#AAAAAA"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M14.8016 5.97618L18.5524 5.99629L18.5176 9.96906"
                                                        stroke="#AAAAAA" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M5.8574 18.896L10.5507 13.9964" stroke="#AAAAAA"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M9.60852 18.9164L5.85775 18.8963L5.89258 14.9235"
                                                        stroke="#AAAAAA" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                                <svg class="full-normal-screen icon-32 d-none" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.7542 10.1932L18.1867 5.79319" stroke="#AAAAAA"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M17.2976 10.212L13.7547 10.1934L13.7871 6.62518"
                                                        stroke="#AAAAAA" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M10.4224 13.5726L5.82149 18.1398" stroke="#AAAAAA"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path d="M6.74391 13.5535L10.4209 13.5723L10.3867 17.2755"
                                                        stroke="#AAAAAA" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End --> <!--Footer End-->

    <!--Burger Menu Start-->
    <div class="iq-float-menu">
        <input type="checkbox" href="#" name="menu-open" id="menu-open" class="iq-float-menu-open">
        <label for="menu-open" class="iq-float-menu-open-button">
            <span class="lines line-1"></span>
            <span class="lines line-2"></span>
            <span class="lines line-3"></span>
        </label>
        <span class="iq-float-menu-item bg-primary float-menu-rtl-mode" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Direction Mode">
            <span class="ltr-mode" data-setting="attribute">
                <input type="radio" value="ltr" class="btn-check" name="theme_scheme_direction" data-prop="dir"
                    id="theme-scheme-direction-ltr">
                <label class="m-o p-0" for="theme-scheme-direction-ltr">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 18H21M3 18L6 21M3 18L6 15M11 12V3H17M15 3V12M10.5 3C10.0404 3 9.58525 3.0776 9.16061 3.22836C8.73597 3.37913 8.35013 3.6001 8.02513 3.87868C7.70012 4.15726 7.44231 4.48797 7.26642 4.85195C7.09053 5.21593 7 5.60603 7 6C7 6.39397 7.09053 6.78407 7.26642 7.14805C7.44231 7.51203 7.70012 7.84274 8.02513 8.12132C8.35013 8.3999 8.73597 8.62087 9.16061 8.77164C9.58525 8.9224 10.0404 9 10.5 9L10.5 3Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </label>
            </span>
            <span class="rtl-mode" data-setting="attribute">
                <input type="radio" value="rtl" class="btn-check" name="theme_scheme_direction" data-prop="dir"
                    id="theme-scheme-direction-rtl">
                <label class="m-o p-0" for="theme-scheme-direction-rtl">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 18H21M3 18L6 21M3 18L6 15M11 12V3H17M15 3V12M10.5 3C10.0404 3 9.58525 3.0776 9.16061 3.22836C8.73597 3.37913 8.35013 3.6001 8.02513 3.87868C7.70012 4.15726 7.44231 4.48797 7.26642 4.85195C7.09053 5.21593 7 5.60603 7 6C7 6.39397 7.09053 6.78407 7.26642 7.14805C7.44231 7.51203 7.70012 7.84274 8.02513 8.12132C8.35013 8.3999 8.73597 8.62087 9.16061 8.77164C9.58525 8.9224 10.0404 9 10.5 9L10.5 3Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </label>
            </span>
        </span>
        <span class="iq-float-menu-item bg-info float-menu-color-mode" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Color Mode">
            <span class="light-mode" data-setting="radio">
                <input type="radio" id="color-mode-light" class="btn-check" value="light" name="theme_scheme">
                <label class="switch-icon-label light-icon" for="color-mode-light">
                    <svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path
                                d="M15.6999 11.0021C15.6999 13.449 13.7161 15.4328 11.2691 15.4328C8.82218 15.4328 6.83838 13.449 6.83838 11.0021C6.83838 8.55509 8.82218 6.57129 11.2691 6.57129C13.7161 6.57129 15.6999 8.55509 15.6999 11.0021Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M11.2693 4.50365L11.2693 1.5498" stroke="currentColor" stroke-width="1.5" />
                            <path d="M11.2693 20.4543L11.2693 17.5005" stroke="currentColor" stroke-width="1.5" />
                            <path d="M17.7676 11.002L20.7214 11.002" stroke="currentColor" stroke-width="1.5" />
                            <path d="M1.81691 11.002L4.77075 11.002" stroke="currentColor" stroke-width="1.5" />
                            <path d="M15.8642 6.40654L17.9529 4.31787" stroke="currentColor" stroke-width="1.5" />
                            <path d="M4.58516 17.6858L6.67383 15.5972" stroke="currentColor" stroke-width="1.5" />
                            <path d="M15.8647 15.5969L17.9534 17.6855" stroke="currentColor" stroke-width="1.5" />
                            <path d="M4.58541 4.31807L6.67407 6.40674" stroke="currentColor" stroke-width="1.5" />
                        </g>
                        <defs>
                            <clipPath>
                                <rect width="21.5385" height="20" fill="white" transform="translate(0.5 0.848145)" />
                            </clipPath>
                        </defs>
                    </svg>
                </label>
            </span>
            <div class="dark-mode" data-setting="radio">
                <input type="radio" id="color-mode-dark" class="btn-check custom-inputs" value="dark" name="theme_scheme"
                    checked>
                <label class="switch-icon-label dark-icon" for="color-mode-dark">
                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.67947 0.610121C7.54098 0.798414 7.51561 1.04704 7.6132 1.25943C8.04109 2.19062 8.25182 3.11105 8.25182 4.13855C8.25182 7.36765 5.53103 10.128 2.03754 10.128C1.66261 10.128 1.27334 10.0371 0.793957 9.92119C0.55797 9.86413 0.309965 9.94489 0.152823 10.13C-0.00431902 10.315 -0.0437864 10.5729 0.0507908 10.7965C1.20467 13.5246 4.00668 15.3481 7.26756 15.3481C11.5607 15.3481 15 11.9261 15 7.84815C15 4.02506 12.0717 0.842474 8.27956 0.353436C8.04774 0.32354 7.81796 0.421827 7.67947 0.610121ZM9.21399 1.86727C11.8368 2.67847 13.7143 5.07555 13.7143 7.84815C13.7143 11.1894 10.8775 14.0624 7.26756 14.0624C4.97916 14.0624 3.00922 13.015 1.85983 11.4093C1.91884 11.4122 1.97811 11.4137 2.03754 11.4137C6.21474 11.4137 9.53753 8.10382 9.53753 4.13855C9.53753 3.34115 9.42909 2.594 9.21399 1.86727Z"
                            fill="currentColor" />
                    </svg>
                </label>
            </div>
        </span>
        <span class="iq-float-menu-item bg-dark float-menu-coming-soon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Coming Soon">
            <span class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-palette"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm4 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM5.5 7a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                    <path
                        d="M16 8c0 3.15-1.866 2.585-3.567 2.07C11.42 9.763 10.465 9.473 10 10c-.603.683-.475 1.819-.351 2.92C9.826 14.495 9.996 16 8 16a8 8 0 1 1 8-8zm-8 7c.611 0 .654-.171.655-.176.078-.146.124-.464.07-1.119-.014-.168-.037-.37-.061-.591-.052-.464-.112-1.005-.118-1.462-.01-.707.083-1.61.704-2.314.369-.417.845-.578 1.272-.618.404-.038.812.026 1.16.104.343.077.702.186 1.025.284l.028.008c.346.105.658.199.953.266.653.148.904.083.991.024C14.717 9.38 15 9.161 15 8a7 7 0 1 0-7 7z" />
                </svg>
            </span>
        </span>
    </div> <!--Burger Menu End-->

    <!-- Wrapper End-->

    <script>
        const image = document.getElementById('image');
        const songId = document.getElementById('song_<?php echo $song['idsong'] ?>');
        
        let isActive = false;
        image.addEventListener('click', () => {
            if(isActive == false) {
                songId.play();
                isActive = true
            } else {
                songId.pause();
                isActive = false
            }
        })
    </script>