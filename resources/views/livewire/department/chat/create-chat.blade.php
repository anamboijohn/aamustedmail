<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

    <div class="email-wrap bookmark-wrap">
        <div class="row">

            <div class="col-xl-12 col-md-12 box-col-12 xl-100">
                <div class="email-right-aside bookmark-tabcontent contacts-tabs">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-personal" role="tabpanel"
                                    aria-labelledby="pills-personal-tab">

                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5>Departments</h5><span class="f-14 pull-right mt-0">{{ count($users) }}
                                                Contacts</span>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="row list-persons" id="addcon">

                                                <div class="col-xl-4 xl-50 col-md-5 box-col-6">
                                                    <div class="nav flex-column nav-pills" id="v-pills-tab"
                                                        role="tablist" aria-orientation="vertical">

                                                        @forelse ($users as $user)
                                                            <a class="contact-tab-0 nav-link" id="v-pills-user-tab"
                                                                data-bs-toggle="pill"
                                                                wire:click.prevent="contactDetail({{ $user->id }})"
                                                                href="#v-pills-user" role="tab"
                                                                aria-controls="v-pills-user" aria-selected="false">
                                                                <div class="media"><img
                                                                        class="img-50 img-fluid m-r-20 rounded-circle update_img_0"
                                                                        src="https://ui-avatars.com/api/?name={{ $user->name }}"
                                                                        alt="">
                                                                    <div class="media-body">
                                                                        <h6> <span
                                                                                class="first_name_0">{{ $user->name }}
                                                                            </span></h6>
                                                                        <p class="email_add_0">{{ $user->email }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @empty
                                                        @endforelse

                                                    </div>
                                                </div>
                                                <div class="col-xl-8 xl-50 col-md-7 box-col-6">
                                                    <div class="tab-content" id="v-pills-tabContent">


                                                        <div class="" id="v-pills-user" role="tabpanel"
                                                            aria-labelledby="v-pills-user-tab">

                                                            @if ($showDeatail == true)
                                                                <div wire:ignore class="profile-mail">
                                                                    <div class="media align-items-center">
                                                                        <img class="img-100 img-fluid m-r-20 rounded-circle update_img_0"
                                                                            src="https://ui-avatars.com/api/?name={{ $staff_name }}"
                                                                            alt="">
                                                                        <input class="updateimg" type="file"
                                                                            name="img" onchange="readURL(this,0)">
                                                                        <div class="media-body mt-0">
                                                                            <h5>
                                                                                <span
                                                                                    class="first_name_0">{{ $staff_name }}
                                                                                </span>
                                                                            </h5>
                                                                            <p class="email_add_0">{{ $staff_email }}
                                                                            </p>
                                                                            <ul>
                                                                                <li><a href="#"
                                                                                        wire:click='checkconversation({{ $staff_id }})'>Add</a>
                                                                                </li>
                                                                                <li><a type="button"
                                                                                        wire:click.prevent="exit()">Exit</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="email-general">
                                                                        <h6 class="mb-3">General</h6>
                                                                        <ul>
                                                                            <li>Name <span
                                                                                    class="font-primary first_name_0">{{ $staff_name }}</span>
                                                                            </li>


                                                                            <li>Email Address <span
                                                                                    class="font-primary email_add_0">{{ $staff_email }}
                                                                                </span></li>

                                                                            <li>Created At<span class="font-primary">
                                                                                    {{ $staff_created_at->shortAbsoluteDiffForHumans() }}
                                                                            </li>


                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
