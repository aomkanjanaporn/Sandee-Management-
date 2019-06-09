<?
require_once("config.inc.php");
include("layoutsBS/header.php");
?>
 <section class="wrapper">
	
	<a link="reserve_form.php" method="get">
		<button type="button" class="btn btn-theme">
			<h4> <i class="fa fa-plus"></i>  เพิ่มรายการจองบ้าน </h4>
		</button>
	</a>
       <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> รายชื่อผู้จองบ้าน</h4>
                <hr>
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th><i class="fa fa-user"></i>  &nbsp; &nbsp;  ชื่อ-นามสกุล</th>
                    <th><i class="fa fa-bookmark"></i> &nbsp; &nbsp; Line ID</th>
                    <th><i class=" fa fa-phone"></i> &nbsp; &nbsp; เบอร์โทรศัพท์</th>
                    <th>สถานะการจอง</th>
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1.</td>
                    <td>นางสาวกาญจนาพร งามวงศ์</td>
                    <td>aommy05349</td>
					<td>098-25525734</td>
                    <td><span class="label label-warning label-mini">expire 3 date</span></td>
                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>นางสาวกาญจนาพร งามวงศ์</td>
                    <td>aommy05349</td>
					<td>098-25525734</td>
                    <td><span class="label label-warning label-mini">expire 3 date</span></td>
                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>นางสาวกาญจนาพร งามวงศ์</td>
                    <td>aommy05349</td>
					<td>098-25525734</td>
                    <td><span class="label label-warning label-mini">expire 3 date</span></td>
                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
    </section>
<?
include("layoutsBS/footer.php");
?>
