@extends('layouts.ownerNav')

@section('content')
    <div class="" style="width:85%; height:auto; margin-left:15%; float:left">
        <div class="d-flex justify-content-center" style="width: 100%; height:auto; position:relative">
            {{-- Content --}}
            <div class="mt-4 row justify-content-center" style="width:95%; height:auto">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }};
                    </div>
                @elseif (session('destroy'))
                    <div class="alert alert-danger">
                        {{ session('destroy') }};
                    </div>
                @endif
                <h3 class="mb-4" style="color: rgb(0, 0, 216)">Product History</h3>
                {{-- Main --}}
                <div class="row justify-content-center mb-5"
                    style="width: 100%; height:auto; background-color:rgb(255, 255, 255); border-radius:10px; box-shadow: 2px 3px 6px #4b4b4b42;">

                    {{-- Top --}}
                    <div class="d-flex justify-content-between align-items-center pe-0" style="">
                        {{-- Search --}}
                        <div class="row justify-content-center my-4" style="flex-grow: 1;">
                            <div class="d-flex align-items-center pt-3 ps-2 pe-2"
                                style="border: 1px solid rgb(134, 134, 134); border-radius:10px; width:400px; height:35px; box-shadow: 1px 1px 10px #00000042;">
                                <form action="{{ route('display.product.history.owner') }}" method="GET"
                                    class="d-flex justify-content-between align-items-center"
                                    style="width:100%; border-radius:10px">
                                    <input type="text" placeholder="Search" name="search" value=""
                                        style="border: none; outline: none; color:rgb(61, 61, 61); width:100%" />
                                    <button type="submit"
                                        style="border: none; outline: none; background-color:transparent">
                                        <svg style="color: grey" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="18" height="18" fill="currentColor">
                                            <path
                                                d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Sorting --}}
                        <div class="dropdown me-1">
                            <div style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg width="18" height="18" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.29303 5.707C8.10556 5.51947 8.00024 5.26517 8.00024 5C8.00024 4.73484 8.10556 4.48053 8.29303 4.293L11.293 1.293C11.3853 1.19749 11.4956 1.12131 11.6176 1.0689C11.7396 1.01649 11.8709 0.988904 12.0036 0.987751C12.1364 0.986597 12.2681 1.0119 12.391 1.06218C12.5139 1.11246 12.6255 1.18671 12.7194 1.28061C12.8133 1.3745 12.8876 1.48615 12.9379 1.60905C12.9881 1.73194 13.0134 1.86362 13.0123 1.9964C13.0111 2.12918 12.9835 2.2604 12.9311 2.38241C12.8787 2.50441 12.8025 2.61475 12.707 2.707L9.70703 5.707C9.5195 5.89447 9.26519 5.99979 9.00003 5.99979C8.73487 5.99979 8.48056 5.89447 8.29303 5.707Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.707 5.707C15.5195 5.89447 15.2652 5.99979 15 5.99979C14.7349 5.99979 14.4806 5.89447 14.293 5.707L11.293 2.707C11.1109 2.5184 11.0101 2.2658 11.0124 2.0036C11.0146 1.7414 11.1198 1.49059 11.3052 1.30518C11.4906 1.11977 11.7414 1.01461 12.0036 1.01233C12.2658 1.01005 12.5184 1.11084 12.707 1.293L15.707 4.293C15.8945 4.48053 15.9998 4.73484 15.9998 5C15.9998 5.26517 15.8945 5.51947 15.707 5.707Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3C12.2653 3 12.5196 3.10536 12.7071 3.29289C12.8947 3.48043 13 3.73478 13 4V12C13 12.2652 12.8947 12.5196 12.7071 12.7071C12.5196 12.8946 12.2653 13 12 13C11.7348 13 11.4805 12.8946 11.2929 12.7071C11.1054 12.5196 11 12.2652 11 12V4C11 3.73478 11.1054 3.48043 11.2929 3.29289C11.4805 3.10536 11.7348 3 12 3ZM7.70704 10.293C7.89451 10.4805 7.99983 10.7348 7.99983 11C7.99983 11.2652 7.89451 11.5195 7.70704 11.707L4.70704 14.707C4.51844 14.8892 4.26584 14.99 4.00364 14.9877C3.74144 14.9854 3.49063 14.8802 3.30522 14.6948C3.11981 14.5094 3.01465 14.2586 3.01237 13.9964C3.01009 13.7342 3.11088 13.4816 3.29304 13.293L6.29304 10.293C6.48057 10.1055 6.73488 10.0002 7.00004 10.0002C7.26521 10.0002 7.51951 10.1055 7.70704 10.293Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.293031 10.293C0.480558 10.1055 0.734866 10.0002 1.00003 10.0002C1.26519 10.0002 1.5195 10.1055 1.70703 10.293L4.70703 13.293C4.80254 13.3852 4.87872 13.4956 4.93113 13.6176C4.98354 13.7396 5.01113 13.8708 5.01228 14.0036C5.01343 14.1364 4.98813 14.2681 4.93785 14.391C4.88757 14.5138 4.81332 14.6255 4.71943 14.7194C4.62553 14.8133 4.51388 14.8875 4.39098 14.9378C4.26809 14.9881 4.13641 15.0134 4.00363 15.0123C3.87085 15.0111 3.73963 14.9835 3.61763 14.9311C3.49562 14.8787 3.38528 14.8025 3.29303 14.707L0.293031 11.707C0.105559 11.5195 0.000244141 11.2652 0.000244141 11C0.000244141 10.7348 0.105559 10.4805 0.293031 10.293Z"
                                        fill="#444444" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4 13C3.73478 13 3.48043 12.8946 3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12V4C3 3.73478 3.10536 3.48043 3.29289 3.29289C3.48043 3.10536 3.73478 3 4 3C4.26522 3 4.51957 3.10536 4.70711 3.29289C4.89464 3.48043 5 3.73478 5 4V12C5 12.2652 4.89464 12.5196 4.70711 12.7071C4.51957 12.8946 4.26522 13 4 13Z"
                                        fill="#444444" />
                                </svg>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">From A to Z</a></li>
                                <li><a class="dropdown-item" href="#">Price Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Price High to Low</a></li>
                                <li><a class="dropdown-item" href="#">Cost Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Cost High to Low</a></li>
                                <li><a class="dropdown-item" href="#">Create Date</a></li>
                            </ul>
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">No</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Product</th>
                                {{-- <th scope="col" style="color:rgba(134, 134, 134, 0.911); width:64px">Status</th> --}}
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Proof</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Cost (RM)</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Price (RM)</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Expired</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Created By</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Create Date</th>
                                <th scope="col" style="color:rgba(134, 134, 134, 0.911);">Remove Date</th>
                                <th scope="col" style="width: 30px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr style="height: 40px">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->productName }}</td>
                                    {{-- <td class="">
                                        @if ($item->productStatus == '0')
                                        <div class="d-flex justify-content-center">
                                            <svg width="18" height="18" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6C12 9.31371 9.31371 12 6 12C2.68629 12 0 9.31371 0 6C0 2.68629 2.68629 0 6 0C9.31371 0 12 2.68629 12 6Z" fill="#EE0000"/>
                                                <path d="M2 6C2 5.44772 2.44772 5 3 5H9C9.55228 5 10 5.44772 10 6C10 6.55228 9.55228 7 9 7H3C2.44772 7 2 6.55228 2 6Z" fill="#F6F6F6"/>
                                                </svg>
                                                
                                        </div>

                                        @elseif ($item->productStatus == '1')
                                            <div class="d-flex justify-content-center">
                                                <svg width="18" height="18" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 6C12 9.31371 9.31371 12 6 12C2.68629 12 0 9.31371 0 6C0 2.68629 2.68629 0 6 0C9.31371 0 12 2.68629 12 6Z" fill="#0017E7"/>
                                                    <path d="M5.46166 8.62341C5.13849 9.06941 4.56429 9.12758 4.17916 8.75334L2.3252 6.95188C1.94006 6.57764 1.88983 5.91271 2.213 5.46672C2.53617 5.02072 3.11037 4.96254 3.49551 5.33678L5.34946 7.13825C5.7346 7.51249 5.78483 8.17741 5.46166 8.62341Z" fill="#F6F6F6"/>
                                                    <path d="M3.97845 8.47152C3.72706 7.96732 3.87624 7.32259 4.31165 7.03148L8.63435 4.14141C9.06975 3.85031 9.6265 4.02306 9.87789 4.52727C10.1293 5.03148 9.98009 5.6762 9.54468 5.96731L5.22198 8.85738C4.78658 9.14849 4.22983 8.97573 3.97845 8.47152Z" fill="#F6F6F6"/>
                                                    </svg>
                                            </div>
                                        @endif
                                    </td> --}}

                                    <td>
                                        <div>
                                            @if ($item->productProof)
                                                <a href="{{ asset('product/' . $item->productProof) }}" target="_blank">
                                                    Proof {{ $item->productName }}
                                                </a>
                                            @else
                                                <p>No proof available.</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $item->productCost }}</td>
                                    <td>{{ $item->productSell }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->productExpired)->format('Y-m-d') }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>
                                        <span style="color: rgb(0, 0, 176);">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                        </span>
                                        <span style="color: rgb(0, 96, 0);">
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- Show the remove date for the removed product only --}}
                                        @if ($item->productStatus == '0')
                                            <span style="color: rgb(0, 0, 176);">
                                                {{ \Carbon\Carbon::parse($item->updated_at)->format('d-m-Y') }}
                                            </span>
                                            <span style="color: rgb(0, 96, 0);">
                                                {{ \Carbon\Carbon::parse($item->updated_at)->format('h:i A') }}
                                            </span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Only the removed product can be deleted --}}
                                        @if ($item->productStatus == '0')
                                            <a href="{{ url('owner/destroy/' . $item->id . '/product') }}">
                                                <svg style="color: rgba(0, 0, 0, 0.692)"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="21"
                                                    height="21" fill="currentColor">
                                                    <path
                                                        d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 11H11V17H9V11ZM13 11H15V17H13V11ZM9 4V6H15V4H9Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="paginate" class="d-flex justify-content-center">{{ $product->links() }}</div>
                </div>
            </div>
        </div>
    </div>
