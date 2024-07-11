@extends('admin.templates')

@section('content')
<main id="main-container">
    <div class="content">
        <div class="row items-push">
            <div class="col-sm-6 col-xxl-3">
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">32</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Pending Orders</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="far fa-gem fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>View all orders</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">124</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">New Customers</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="far fa-user-circle fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>View all customers</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">45</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Messages</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="far fa-paper-plane fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>View all messages</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xxl-3">
              <div class="block block-rounded d-flex flex-column h-100 mb-0">
                <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center">
                  <dl class="mb-0">
                    <dt class="fs-3 fw-bold">4.5%</dt>
                    <dd class="fs-sm fw-medium fs-sm fw-medium text-muted mb-0">Conversion Rate</dd>
                  </dl>
                  <div class="item item-rounded-lg bg-body-light">
                    <i class="fa fa-chart-bar fs-3 text-primary"></i>
                  </div>
                </div>
                <div class="bg-body-light rounded-bottom">
                  <a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span>View statistics</span>
                    <i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-8 col-xxl-9 d-flex flex-column">
              <div class="block block-rounded flex-grow-1 d-flex flex-column">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Earnings Summary</h3>
                  <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                      <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option">
                      <i class="si si-settings"></i>
                    </button>
                  </div>
                </div>
                <div class="block-content block-content-full flex-grow-1 d-flex align-items-center">
                  <canvas id="js-chartjs-earnings" width="1422" height="840" style="display: block; box-sizing: border-box; height: 420px; width: 711px;"></canvas>
                </div>
                <div class="block-content bg-body-light">
                  <div class="row items-push text-center w-100">
                    <div class="col-sm-4">
                      <dl class="mb-0">
                        <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                          <i class="fa fa-caret-up fs-base text-success"></i>
                          <span>2.5%</span>
                        </dt>
                        <dd class="fs-sm fw-medium text-muted mb-0">Customer Growth</dd>
                      </dl>
                    </div>
                    <div class="col-sm-4">
                      <dl class="mb-0">
                        <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                          <i class="fa fa-caret-up fs-base text-success"></i>
                          <span>3.8%</span>
                        </dt>
                        <dd class="fs-sm fw-medium text-muted mb-0">Page Views</dd>
                      </dl>
                    </div>
                    <div class="col-sm-4">
                      <dl class="mb-0">
                        <dt class="fs-3 fw-bold d-inline-flex align-items-center space-x-2">
                          <i class="fa fa-caret-down fs-base text-danger"></i>
                          <span>1.7%</span>
                        </dt>
                        <dd class="fs-sm fw-medium text-muted mb-0">New Products</dd>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-xxl-3 d-flex flex-column">
              <div class="row items-push flex-grow-1">
                <div class="col-md-6 col-xl-12">
                  <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content flex-grow-1 d-flex justify-content-between">
                      <dl class="mb-0">
                        <dt class="fs-3 fw-bold">570</dt>
                        <dd class="fs-sm fw-medium text-muted mb-0">Total Orders</dd>
                      </dl>
                      <div>
                        <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-danger bg-danger-light">
                          <i class="fa fa-caret-down me-1"></i>
                          2.2%
                        </div>
                      </div>
                    </div>
                    <div class="block-content p-1 text-center overflow-hidden">
                      <canvas id="js-chartjs-total-orders" style="height: 90px; display: block; box-sizing: border-box; width: 223px;" width="447" height="180"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-xl-12">
                  <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content flex-grow-1 d-flex justify-content-between">
                      <dl class="mb-0">
                        <dt class="fs-3 fw-bold">$5,234.21</dt>
                        <dd class="fs-sm fw-medium text-muted mb-0">Total Earnings</dd>
                      </dl>
                      <div>
                        <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                          <i class="fa fa-caret-up me-1"></i>
                          4.2%
                        </div>
                      </div>
                    </div>
                    <div class="block-content p-1 text-center overflow-hidden">
                      <canvas id="js-chartjs-total-earnings" style="height: 90px; display: block; box-sizing: border-box; width: 223px;" width="447" height="180"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="block block-rounded d-flex flex-column h-100 mb-0">
                    <div class="block-content flex-grow-1 d-flex justify-content-between">
                      <dl class="mb-0">
                        <dt class="fs-3 fw-bold">264</dt>
                        <dd class="fs-sm fw-medium text-muted mb-0">New Customers</dd>
                      </dl>
                      <div>
                        <div class="d-inline-block px-2 py-1 rounded-3 fs-xs fw-semibold text-success bg-success-light">
                          <i class="fa fa-caret-up me-1"></i>
                          9.3%
                        </div>
                      </div>
                    </div>
                    <div class="block-content p-1 text-center overflow-hidden">
                      <canvas id="js-chartjs-new-customers" style="height: 90px; display: block; box-sizing: border-box; width: 223px;" width="447" height="180"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="row items-push">
            <div class="col-xl-6">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Top Products</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                                <tr>
                                    <td class="text-center" style="width: 100px">
                                        <a class="fw-semibold"
                                            href="be_pages_ecom_product_edit.html">PID.965</a>
                                    </td>
                                    <td>
                                        <a href="be_pages_ecom_product_edit.html">Diablo III</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="block block-rounded h-100 mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Latest Orders</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter">
                            <tbody>
                                <tr>
                                    <td class="fw-semibold text-center fs-sm" style="width: 100px">
                                        <a href="be_pages_ecom_order.html">ORD.7116</a>
                                    </td>
                                    <td class="d-none d-sm-table-cell fs-sm">
                                        <a href="be_pages_ecom_customer.html">Megan Fuller</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                    </td>
                                    <td class="fw-medium fs-sm text-end">$734,00</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    
@endsection