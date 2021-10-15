@extends('layouts.index')
@section('title')
    About - {{ \App\Memorial::fullname($detail) }}
@endsection
@section('description')
    <meta name="description" content="{{ \App\Memorial::fullname($detail) }}">

    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
@endsection
@section('css')
    <style>
        @media only screen and (min-width: 320px) and (max-width: 480px) {
            .header-text {
                display: none;
            }
            .header-image {
                /*margin-left: 51px;*/
                border: 2px solid #65594d;
                height: 250px;
            }
        }
    </style>
@endsection
@section('content')
    @include('partials.foraudio')
{{--    @include('partials.success1')--}}
{{--    @include('partials.loginerror')--}}
{{--    @include('partials.logout')--}}
{{--    @include('partials.register')--}}


    <div class="container-fluid" style="background-image: url({{ asset('img/slider/02/1.jpg') }});height: 220px">
        <div class="row">
            <div class="col-md-8">

                {{--            <divstyle="height: 190px;">--}}
                {{--                <img src="{{assets('img/slider/02/1.jpg')}}" class="img-responsive" alt="" />--}}
            </div>
            @if($detail->picture != NULL)
            <div class="col-md-12 text-center">
                <img src="{{ asset('uploads/memorial/'.$detail->picture) }}" alt=""  style="border: 5px solid #65594d; border-radius: 10px" height="270px" width="270px" class="margin-top-40 header-image"/>
                {{--            </div>--}}
            </div>
            @endif
        </div>
    </div>
    <div class="single-content padding-vertical-100">
        <div class="container">
            <div class="section-head text-center margin-bottom-60 wow fadeInUp">
                <h3 class="h2">{{ \App\Memorial::fullname($detail) }}</h3>
                <h3 class="h4">{{ \Carbon\Carbon::parse($detail->born_date)->year }} - {{ \Carbon\Carbon::parse($detail->passed_away_date)->year }}</h3>
                {{--                <p>Request a book of memories.</p>--}}
            </div>
            <div class="row">
                <div class="col-md-9 col-sm-7 single-info wow fadeInUp">
                    <div class="details">
                        <h5>{{ \App\Memorial::fullname($detail) }}</h5>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @include('partials.list_error')
                        @include('partials.success')

                        <p class="text-center" style="font-size: 20px;word-break: break-word;line-height: 1.4"><span style="font-size: 13px;" class="fa fa-quote-left"></span>
                            @if($detail->personal_phrase == NULL)
                           Let the Memory of {{ \App\Memorial::fullname($detail) }} be with us forever
                            @else
                                {{ $detail->personal_phrase }}
                            @endif
                                <span style="font-size: 13px" class="fa fa-quote-right"></span>
                        </p>
                        <br>
                        <p style="font-size: 17px;">
                            @if($detail->main_section_text == NULL)
                                This memorial website was created in memory of our loved one, {{ \App\Memorial::fullname($detail) }} {{ \Carbon\Carbon::parse($detail->passed_away_date)->year - \Carbon\Carbon::parse($detail->born_date)->year  }} years old , born on {{ $detail->born_date->format('M d , Y') }} and passed away on {{ $detail->passed_away_date->format('M d , Y') }}. We will remember {{ $detail->gender == 'Male' ? 'him' : 'her' }} forever.
                            @else
                            {!! $detail->main_section_text !!}
                                @endif
                        </p>
                        @if(auth()->user())
                        @if(auth()->user()->id == $detail->created_by)
                        <a href="#" data-toggle="modal" data-target="#mainsection" class="btn btn-default btn-md"><i class="fa fa-edit"></i> Edit Personal Phrase & Main Section Text</a>
                        @endif
                        @endif
                        <div class="padding-bottom-20"></div>
                        <h5>General Information</h5>
                        <p><i class="flaticon-people"></i> <b>Full Name:</b> {{ \App\Memorial::fullname($detail) }}</p>
                        <p><i class="fa fa-calendar"></i> <b>Date of Birth:</b> Born on {{ $detail->born_date->format('M d, Y') }}</p>
                        <p><i class="fa fa-calendar"></i> <b>Date of Death:</b> Passed Away on {{ $detail->passed_away_date->format('M d, Y') }}</p>
                        @if($detail->birth_country != NULL)
                            <p><i class="fa fa-map-marker"></i> <b>Place of Birth:</b> {{ $detail->birth_state }}, {{ $detail->birth_country }}</p>
                        @endif
                        @if($detail->death_country != NULL)
                        <p><i class="fa fa-map-marker"></i> <b>Place of Death:</b> {{ $detail->death_state }}, {{ $detail->death_country }}</p>
                        @endif
                        @if(auth()->user())
                        @if(auth()->user()->id == $detail->created_by)
                        <a href="#" data-toggle="modal" data-target="#generalInfo" class="btn btn-default btn-md"><i class="fa fa-edit"></i> Edit General Information</a>
                        @endif
                        @endif
                        <div class="padding-bottom-30"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 single-info wow fadeInUp">
                        <h5>Latest Tributes <i class="fa fa-feather"></i> @if(!auth()->user()) | <a href="{{ route('login') }}" style="text-decoration: underline"><b>Sign In to Post a tribute </b></a>@endif</h5>
                        @if(\App\Tribute::countTribute($slug) == 0)
                            <h3>Nothing to show yet</h3>
                            @else
                        @foreach($tribute as $tri)
                            @if($tri->tribute == NULL)
                                <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>Tribute From:</b> @if($tri->from != '')
                                    {{ $tri->from }}
                                @else
                                    {{ $tri->user->name }}
                                @endif
                        <span><i class="fa fa-calendar"></i> {{ $tri->created_at->format('M d , Y') }}</span>

                            </span>
                                    <p><em>{{ $tri->docs }}</em></p>
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_rxma text-center"></div>
                                    {{--                        <cite>-Love Rosanne</cite>--}}
                                </div>
                            @else
                                <div class="condolence-item margin-bottom-30">
                            <span class="meta">
                        <b>Tribute From:</b> @if($tri->from != '')
                                    {{ $tri->from }}
                                @else
                                    {{ $tri->user->name }}
                                @endif
                        <span><i class="fa fa-calendar"></i> {{ $tri->created_at->format('M d , Y') }}</span>

                            </span>
                                    <p><em>{{ $tri->tribute }}</em></p>
                                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                    <div class="addthis_inline_share_toolbox_rxma text-center"></div>
                                    {{--                        <cite>-Love Rosanne</cite>--}}
                                </div>
                            @endif
                        @endforeach
                            @endif
                    </div>
                </div>

                <div class="padding-bottom-50"></div>


                @include('layouts.sidebar')

            </div>
        </div>
    </div>

    <!-- Add Contact -->
    <div class="modal fade" id="generalInfo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 20px;">
                        <i class="fa fa-edit"></i> Edit General Information
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <form  method="POST" action="{{ route('generalInfo', $detail->slug) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h3 style="padding-bottom: 6px;text-decoration: underline">General Information</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-name">
                                    <label for="contact-name" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">First Name</label>
                                    <input style="height: 50px;" type="text" name="first_name" id="contact-name" class="form-control" required="" value="{{$detail->first_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-email">
                                    <label for="contact-email" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Last Name</label>
                                    <input style="height: 50px;" type="text" name="last_name" id="contact-email" class="form-control" required="" value="{{$detail->last_name}}">
                                </div>
                            </div>
                        </div>
        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Gender</label>
                                    <select style="height: 50px;" name="gender" id="contact-location" class="form-control">
                                        @if($detail->gender == 'Male')
                                        <option>{{ $detail->gender }}</option>
                                        <option>Female</option>
                                        @else
                                            <option>{{ $detail->gender }}</option>
                                            <option>Male</option>
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Relationship</label>
                                    <select style="height: 50px;" name="relationship" id="contact-location" class="form-control">
                                        <option value="{{ $detail->relationship }}">{{ $detail->relationship}}</option>
                                        <option value="Aunt">Aunt</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Boyfriend">Boyfriend</option>
                                        <option value="Colleague">Colleague</option>
                                        <option value="Cousin">Cousin</option>
                                        <option value="Daughter">Daughter</option>
                                        <option value="Father">Father</option>
                                        <option value="Friend">Friend</option>
                                        <option value="Girlfriend">Girlfriend</option>
                                        <option value="Granddaughter">Granddaughter</option>
                                        <option value="Grandfather">Grandfather</option>
                                        <option value="Grandmother">Grandmother</option>
                                        <option value="Grandson">Grandson</option>
                                        <option value="Husband">Husband</option>
                                        <option value="Mother">Mother</option>
                                        <option value="Nephew">Nephew</option>
                                        <option value="Niece">Niece</option>
                                        <option value="Girlfriend">Sister</option>
                                        <option value="Son">Son</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
        <h3 style="padding-bottom: 6px;text-decoration: underline">Birth Information</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Date of Birth</label>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <select style="height: 50px;" name="born_month" class="form-control">
                                                <option>{{ \Carbon\Carbon::parse($detail->born_date)->monthName }}</option>
                                                <option value="01">January</option>
                                                <option value="02">Feburary</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
{{--                                            <input style="height: 50px;" type="number" name="born_day" class="form-control" placeholder="12" value="{{ \Carbon\Carbon::parse($detail->born_date)->day }}">--}}
                                            <select style="height: 50px;" class="form-control" name="born_day">
                                                <option value="{{ \Carbon\Carbon::parse($detail->born_date)->day }}">{{ \Carbon\Carbon::parse($detail->born_date)->day }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
{{--                                            <input style="height: 50px;" type="number" name="born_year" class="form-control" placeholder="1990 (4 digits)" value="{{ \Carbon\Carbon::parse($detail->born_date)->year }}">--}}
                                            <select style="height: 50px;" class="form-control selectElementId" name="born_year">
                                            </select>
                                        </div>
                                    </div>
{{--                                    <input type="text" name="born_date" id="datetimepicker" class="form-control">--}}
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">State or Town of Birth</label>
                                    <input style="height: 50px;" type="text" name="birth_state" id="contact-location" class="form-control" value="{{ $detail->birth_state }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Country of Birth</label>
{{--                                    <input style="height: 50px;" type="text" name="birth_country" id="contact-location" class="form-control" value="{{ $detail->birth_country }}">--}}
                                    <select id="contact-location" name="birth_country" style="height: 50px" class="form-control">
                                        <option>
                                            @if($detail->birth_country)
                                               {{ $detail->birth_country}}
                                            @else
                                                Select Country
                                            @endif
                                        </option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <br>
                        <h3 style="padding-bottom: 6px;text-decoration: underline">Death Information</h3>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Date of Death</label>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <select style="height: 50px;" name="death_month" class="form-control">
                                                <option>{{ \Carbon\Carbon::parse($detail->passed_away_date)->monthName }}</option>
                                                <option value="01">January</option>
                                                <option value="02">Feburary</option>
                                                <option value="03">March</option>
                                                <option value="04">April</option>
                                                <option value="05">May</option>
                                                <option value="06">June</option>
                                                <option value="07">July</option>
                                                <option value="08">August</option>
                                                <option value="09">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
{{--                                            <input type="number" name="death_day" class="form-control" placeholder="01" value="{{ \Carbon\Carbon::parse($detail->passed_away_date)->day }}">--}}
                                            <select style="height: 50px;" class="form-control" name="death_day">
                                                <option value="{{ \Carbon\Carbon::parse($detail->passed_away_date)->day }}">{{ \Carbon\Carbon::parse($detail->passed_away_date)->day }}</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
{{--                                            <input style="height: 50px;" type="number" name="death_year" class="form-control" placeholder="1990 (4 digits)" value="{{ \Carbon\Carbon::parse($detail->passed_away_date)->year }}">--}}
                                            <select style="height: 50px;" class="form-control selectElementId2" name="death_year">
{{--                                                <option value="{{ \Carbon\Carbon::parse($detail->passed_away_date)->year }}"></option>--}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">State or Town of Death</label>
                                    <input style="height: 50px;" type="text" name="death_state" id="contact-location" class="form-control" value="{{ $detail->death_state }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Country of Death</label>
{{--                                    <input style="height: 50px;" type="text" name="death_country" id="contact-location" class="form-control" value="{{ $detail->death_country }}">--}}
                                    <select id="contact-location" name="death_country" style="height: 50px" class="form-control">
                                        <option>
                                            @if($detail->death_country)
                                                {{$detail->death_country}}
                                            @else
                                            Select Country
                                                @endif
                                        </option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <h3 style="padding-bottom: 6px;text-decoration: underline">Media Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Change Picture</label>
                                    <input style="height: 50px;" type="file" name="picture" id="contact-location" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Change Music(optional)</label>
                                    <input style="height: 50px;" type="file" name="music" id="contact-location" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" style="background-color: #c8b69d; color: white" class="btn btn-primary add-todo">Cancel</button>
                        <button type="submit" class="btn btn-primary add-todo">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Contact -->

    <div class="modal fade" id="mainsection">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size: 20px;">
                        <i class="fa fa-edit"></i> Edit Personal Phrase & Main Section
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <form  method="POST" action="{{ route('personalPhrase', $detail->slug) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <h3 style="padding-bottom: 6px;text-decoration: underline">Personal Phrase</h3>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-name">
                                    <label for="contact-name" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Personal Phrase</label>
                                    <textarea name="personal_phrase" cols="30" class="form-control" rows="5">@if($detail->personal_phrase == NULL) Let the Memory of {{ \App\Memorial::fullname($detail) }} be with us forever @else {!! $detail->personal_phrase !!} @endif</textarea>
                                </div>
                            </div>
                        </div>

                        <br>
                        <h3 style="padding-bottom: 6px;text-decoration: underline">Main Section Text</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-location">
                                    <label for="contact-location" class="col-form-label" style="padding-bottom: 5px;color: #c0a16b">Main Section Text</label>
                                  <textarea id="maintext" name="main_section_text" rows="10" cols="50" class="form-control">@if($detail->main_section_text == NULL)This memorial website was created in memory of our loved one, {{ \App\Memorial::fullname($detail) }} {{ \Carbon\Carbon::parse($detail->passed_away_date)->year - \Carbon\Carbon::parse($detail->born_date)->year  }} years old , born on {{ $detail->born_date->format('M d , Y') }} and passed away on {{ $detail->passed_away_date->format('M d , Y') }}. We will remember {{ $detail->gender == 'Male' ? 'him' : 'her' }} forever. @else {!! $detail->main_section_text !!} @endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" style="background-color: #c8b69d; color: white" class="btn btn-primary add-todo">Cancel</button>
                        <button type="submit" class="btn btn-primary add-todo">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')
<script>
    ClassicEditor
        .create( document.querySelector( '#maintext' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    var min = 1900,
        max = new Date().getFullYear(),
        select = document.querySelector('.selectElementId');

    for (var i = min; i <= max; i++) {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
    }

    var date = {{ \Carbon\Carbon::parse($detail->born_date)->year }}
    select.value = date.toString();
</script>

<script>
    var min = 1900,
        max = new Date().getFullYear(),
        select = document.querySelector('.selectElementId2');

    for (var i = min; i <= max; i++) {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
    }
    var date = {{ \Carbon\Carbon::parse($detail->passed_away_date)->year }}
    select.value = date.toString()
    // console.log()
</script>
@endsection
