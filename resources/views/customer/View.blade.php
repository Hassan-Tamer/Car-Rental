<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <link href="{{ asset('css/customer/view.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.sidebar')
    <div class="s007">
        <form>
            <div class="inner-form">
                <div class="basic-search">
                    <div class="input-field">
                        <div class="icon-wrap">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                                <path
                                    d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z">
                                </path>
                            </svg>
                        </div>
                        <input id="search" type="text" placeholder="Search..." />
                        <div class="result-count">
                            <span>#RESULTS</span>results
                        </div>
                    </div>
                </div>
                <div class="advance-search">
                    <span class="desc">Advanced Search</span>
                    <div class="row">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Year</option>
                                    <option>Car Info </option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Model</option>
                                    <option>GREEN</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Color</option>
                                    <option>SIZE</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row second">
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">Country</option>
                                    <option>SALE</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">City</option>
                                    <option>THIS WEEK</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-field">
                            <div class="input-select">
                                <select data-trigger="" name="choices-single-defaul">
                                    <option placeholder="" value="">District</option>
                                    <option>TYPE</option>
                                    <option>SUBJECT B</option>
                                    <option>SUBJECT C</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row third">
                        <div class="input-field">
                            <button class="btn-search">Search</button>
                            <button class="btn-delete" id="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>