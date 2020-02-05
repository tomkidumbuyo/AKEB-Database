<?php $this->load->view('admin/headers_footers/header_assets')?>
<div class="page">
      <div class="page-main" ng-controller="header">
        <div class="header py-4 ">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <!--<img src="./demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo">-->
				AKEB
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                
                <!--<div class="dropdown d-none d-md-flex">
                  <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                    <span class="nav-unread"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                      <div>
                        <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                        <div class="small text-muted">10 minutes ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                      <div>
                        <strong>Alice</strong> started new task: Tabler UI design.
                        <div class="small text-muted">1 hour ago</div>
                      </div>
                    </a>
                    <a href="#" class="dropdown-item d-flex">
                      <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                      <div>
                        <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                        <div class="small text-muted">2 hours ago</div>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
                  </div>
                </div>-->
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)">{{mainuser.initials}}</span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{mainuser.fullname}}</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <!--<a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-user"></i> Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-settings"></i> Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <span class="float-right"><span class="badge badge-primary">6</span></span>
                      <i class="dropdown-icon fe fe-mail"></i> Inbox
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-send"></i> Message
                    </a>--
                    <div class="dropdown-divider"></div>
                    <!--<a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-help-circle"></i> Need help?
                    </a>-->
                    <a class="dropdown-item" href="<?php echo base_url() ?>auth/logout">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="#leads" class="nav-link  {{getPage == 'students'?'active':''}}"><i class="fe fe-user"></i> Students </a>
                  </li>

				  <!--<li class="nav-item">
                    <a href="#inventory" class="nav-link  {{getPage == 'inventory'?'active':''}}"><i class="fe fe-package"></i> Products</a>
                  </li>
                  <li class="nav-item">
                    <a href="#subdealer" class="nav-link  {{getPage == 'subdealer'?'active':''}}"><i class="fe fe-user"></i> Subdealers </a>
                  </li>-->
				  <li class="nav-item">
                    <a href="#users" class="nav-link  {{getPage == 'users'?'active':''}}"><i class="fe fe-user"></i> Users </a>
                  </li>
			    </ul>
              </div>
            </div>
          </div>
        </div>