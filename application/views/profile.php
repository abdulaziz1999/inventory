<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">More Pages</a>
                </li>
                <li class="active">User Profile</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">

            <div class="page-header">
                <h1>
                    User Profile Page
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Inventory System
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">

                    <div>
                        <div id="user-profile-1" class="user-profile row">
                            <div class="col-xs-12 col-sm-3 center">
                                <div>
                                    <span class="profile-picture">
                                        <img id="avatar" class="editable img-responsive" alt="Alex's Avatar"
                                            src="assets/images/avatars/profile-pic.jpg" />
                                    </span>

                                    <div class="space-4"></div>

                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                        <div class="inline position-relative">
                                            <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                &nbsp;
                                                <span class="white"><?= $user->nama?></span>
                                            </a>

                                            <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                                <li class="dropdown-header"> Change Status </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-circle green"></i>
                                                        &nbsp;
                                                        <span class="green">Available</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-circle red"></i>
                                                        &nbsp;
                                                        <span class="red">Busy</span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-circle grey"></i>
                                                        &nbsp;
                                                        <span class="grey">Invisible</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-6"></div>

                                <div class="profile-contact-info">
                                    <div class="profile-contact-links align-left">
                                        <a href="mailto:<?= $user->email?>" class="btn btn-link">
                                            <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                            <?= $user->email?>
                                        </a>

                                        <a href="https://berkahinventorysystem.com/" class="btn btn-link">
                                            <i class="ace-icon fa fa-globe bigger-125 blue"></i>
                                            berkahinventorysystem.com
                                        </a>
                                    </div>

                                    <div class="space-6"></div>

                                    <!-- <div class="profile-social-links align-center">
                                        <a href="#" class="tooltip-info" title=""
                                            data-original-title="Visit my Facebook">
                                            <i class="middle ace-icon fa fa-facebook-square fa-2x blue"></i>
                                        </a>

                                        <a href="#" class="tooltip-info" title=""
                                            data-original-title="Visit my Twitter">
                                            <i class="middle ace-icon fa fa-twitter-square fa-2x light-blue"></i>
                                        </a>

                                        <a href="#" class="tooltip-error" title=""
                                            data-original-title="Visit my Pinterest">
                                            <i class="middle ace-icon fa fa-pinterest-square fa-2x red"></i>
                                        </a>
                                    </div> -->
                                </div>

                                <div class="hr hr12 dotted"></div>

                                <div class="clearfix">
                                    <!-- <div class="grid2">
                                        <span class="bigger-175 blue">25</span>

                                        <br />
                                        Followers
                                    </div> -->
                                    <!-- <img src="<?= base_url()?>/assets/images/foto/berkah.png" alt="logo" >
                                    <span class="blue bolder">Inventory System</span> -->
                                    <!-- <div class="grid2">
                                        <span class="bigger-175 blue">12</span>

                                        <br />
                                        Following
                                    </div> -->
                                </div>

                                <div class="hr hr16 dotted"></div>
                            </div>

                            <div class="col-xs-12 col-sm-9">

                                <div class="space-12"></div>

                                <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Nama </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="username"><?= $user->nama?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Email </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="email"><?= $user->email?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Tempat Lahir </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="tmp_lahir"><?= $user->ttl?></span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Tanggal Lahir </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="signup">2010/06/20</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Age </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="age">38</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Location </div>

                                        <div class="profile-info-value">
                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                            <span class="editable" id="country">Netherlands</span>
                                            <span class="editable" id="city">Amsterdam</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> Last Online </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="login">3 hours ago</span>
                                        </div>
                                    </div>

                                    <div class="profile-info-row">
                                        <div class="profile-info-name"> About Me </div>

                                        <div class="profile-info-value">
                                            <span class="editable" id="about">Editable as WYSIWYG</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-20"></div>

                                <?php if($this->session->userdata('level') == "superuser"){?>
                                    <div class="widget-box transparent">
                                    <div class="widget-header widget-header-small">
                                        <h4 class="widget-title blue smaller">
                                            <i class="ace-icon fa fa-rss orange"></i>
                                            Recent Activities
                                        </h4>

                                        <div class="widget-toolbar action-buttons">
                                            <a href="#" data-action="reload">
                                                <i class="ace-icon fa fa-refresh blue"></i>
                                            </a>
                                            &nbsp;
                                            <a href="#" class="pink">
                                                <i class="ace-icon fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="widget-body">
                                        <div class="widget-main padding-8">
                                            <div id="profile-feed-1" class="profile-feed">
                                                <div class="profile-activity clearfix">
                                                    <div>
                                                        <img class="pull-left" alt="Alex Doe's avatar"
                                                            src="assets/images/avatars/avatar5.png" />
                                                        <a class="user" href="#"> Alex Doe </a>
                                                        changed his profile photo.
                                                        <a href="#">Take a look</a>

                                                        <div class="time">
                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            an hour ago
                                                        </div>
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-125"></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-times bigger-125"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="profile-activity clearfix">
                                                    <div>
                                                        <i
                                                            class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
                                                        <a class="user" href="#"> Alex Doe </a>
                                                        joined
                                                        <a href="#">Country Music</a>

                                                        group.
                                                        <div class="time">
                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            5 hours ago
                                                        </div>
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-125"></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-times bigger-125"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="profile-activity clearfix">
                                                    <div>
                                                        <i
                                                            class="pull-left thumbicon fa fa-picture-o btn-info no-hover"></i>
                                                        <a class="user" href="#"> Alex Doe </a>
                                                        uploaded a new photo.
                                                        <a href="#">Take a look</a>

                                                        <div class="time">
                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            5 hours ago
                                                        </div>
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-125"></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-times bigger-125"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="profile-activity clearfix">
                                                    <div>
                                                        <i
                                                            class="pull-left thumbicon fa fa-pencil-square-o btn-pink no-hover"></i>
                                                        <a class="user" href="#"> Alex Doe </a>
                                                        published a new blog post.
                                                        <a href="#">Read now</a>

                                                        <div class="time">
                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            11 hours ago
                                                        </div>
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-125"></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-times bigger-125"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="profile-activity clearfix">
                                                    <div>
                                                        <i class="pull-left thumbicon fa fa-key btn-info no-hover"></i>
                                                        <a class="user" href="#"> Alex Doe </a>

                                                        logged in.
                                                        <div class="time">
                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            12 hours ago
                                                        </div>
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-125"></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-times bigger-125"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="profile-activity clearfix">
                                                    <div>
                                                        <i
                                                            class="pull-left thumbicon fa fa-power-off btn-inverse no-hover"></i>
                                                        <a class="user" href="#"> Alex Doe </a>

                                                        logged out.
                                                        <div class="time">
                                                            <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                                            16 hours ago
                                                        </div>
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="ace-icon fa fa-pencil bigger-125"></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="ace-icon fa fa-times bigger-125"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="hr hr2 hr-double"></div>

                                <div class="space-6"></div>

                                <div class="center">
                                    <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                                        <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                                        <span class="bigger-110">View more activities</span>

                                        <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                                    </button>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>


                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->