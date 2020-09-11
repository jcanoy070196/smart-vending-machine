@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header text-white bg-danger">Students Accounts</div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">ID Number</th>
                            <th scope="col">RFID Number</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                            <th scope="row">{{ $student->idNumber }}</th>
                            <td>{{ $student->rfid }}</td>
                            <td>{{ $student->firstName }}</td>
                            <td>{{ $student->middleName }}</td>
                            <td>{{ $student->lastName }}</td>
                            <td>{{ $student->balance }}</td>
                            <td align="center"><button onClick="requestStudent({{ $student->id }})" class="btn btn-primary" data-toggle="modal" data-target="#studentModal">Edit</button></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModal" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="studentModalTitle">Student Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="statement-tab" data-toggle="tab" href="#statement" role="tab" aria-controls="statement" aria-selected="false">Statement</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <br>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                    <form id="studentForm" method="POST" action="{{ url('api/students-account')}}">
                                            <div class="form-group row">
                                                <label for="id" class="col-sm-2 col-form-label">ID</label>
                                                <div class="col-sm-10">
                                                <input type="text" readOnly class="form-control" id="modalId" placeholder="ID">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="idNumber" class="col-sm-2 col-form-label">ID Number</label>
                                                <div class="col-sm-10">
                                                <input type="text" readOnly class="form-control" id="modalIdNumber" placeholder="ID Number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
                                                <div class="col-sm-10">
                                                <input type="text" readOnly class="form-control" id="modalFirstName" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middleName" class="col-sm-2 col-form-label">Middle Name</label>
                                                <div class="col-sm-10">
                                                <input type="text" readOnly class="form-control" id="modalMiddleName" placeholder="Middle Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-10">
                                                <input type="text" readOnly class="form-control" id="modalLastName" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="balance" class="col-sm-2 col-form-label">Balance</label>
                                                <div class="col-sm-10">
                                                <input type="number" readOnly class="form-control" id="modalBalance" placeholder="Balance">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="rfid" class="col-sm-2 col-form-label">RFID</label>
                                                <div class="col-sm-10">
                                                <input type="text" class="form-control" id="modalRfid" value="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                
                                
                                </div>
                                <div class="tab-pane fade" id="statement" role="tabpanel" aria-labelledby="statement-tab" style="margin : 10px 10px 10px 10px">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p>Name : <span id="statementName">Sample</span></p>
                                            <p>ID Number :<span id="statementID">1320844</span>      Category : C</p>
                                            <p>Status : C</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p>Course : ENEC</p>
                                            <p>Year : 5</p>
                                            <p>Copy : 1</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p> </p>
                                            <p>Last Print Date :</p>
                                            <p>Last Print Time :</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-2">
                                            <center><h5>Subjects</h5></center>
                                            <span>ECE52_B</span> <span>3</span><br>
                                            <span>ECE52L_B</span> <span>1</span><br>
                                            <span>ECE56A_B</span> <span>3</span><br>
                                            <span>ECE58_B</span> <span>1</span><br>
                                            <span>ECEL4A_B</span> <span>3</span><br>
                                            <span>ECEL5A_B</span> <span>3</span><br>
                                            <span>ECER3_A</span> <span>3</span><br>
                                            <span>ECER4_A</span> <span>3</span><br>
                                            <span>ENG6E_B</span> <span>3</span><br>
                                            <span>HUM_A</span> <span>3</span><br>
                                            <span>RIZAL_G</span> <span>3</span><br>
                                            <span>-------------------</span><br>
                                            <strong><span>Total Units : 29</span></strong>
                                        </div>
                                        <div class="col-lg-3">
                                            <center><h5>Misc</h5></center>
                                            <span>Registration</span> <span class="float-right">284.10</span><br>
                                            <span>Medical/Dental</span> <span  class="float-right">270.70</span><br>
                                            <span>Athletic</span> <span  class="float-right">531.50</span><br>
                                            <span>Library</span> <span  class="float-right">1288.25</span><br>
                                            <span>Student Services</span > <span  class="float-right">578.35</span><br>
                                            <span>Guidance & Counseling</span> <span  class="float-right">488.00</span><br>
                                            <span>Audio Visual</span> <span  class="float-right">422.10</span><br>
                                            <span>MIS Fee</span> <span  class="float-right">356.80</span><br>
                                            <span>Total</span> <span  class="float-right">4,219.80</span><br>
                                        </div>
                                        <div class="col-lg-3">
                                            <center><h5>Special Fees</h5></center>
                                            <span>Community Service</span> <span class="float-right">52.50</span><br>
                                            <span>Culutral Fee</span> <span  class="float-right">78.75</span><br>
                                            <span>PRISAA</span> <span  class="float-right">100.00</span><br>
                                            <span>PTC</span> <span  class="float-right">75.00</span><br>
                                            <span>USG</span > <span  class="float-right">75.00</span><br>
                                            <span>Sportfest/U-Week</span> <span  class="float-right">100.00</span><br>
                                            <span>School Paper</span> <span  class="float-right">179.55</span><br>
                                            <span>Energy Fee</span> <span  class="float-right">1000.00</span><br>
                                            <h5>Total</h5> <span  class="float-right">1,660.80</span><br>
                                        </div>
                                        <div class="col-lg-4">
                                            <center><h5>Summary</h5></center>
                                            <span>Total Tuition (29 * 692.75</span> <span class="float-right">20,089.75</span><br>
                                            <span>Laboratory Fees</span> <span  class="float-right">0.00</span><br>
                                            <span>Misc. Fees</span> <span  class="float-right">4,219.80</span><br>
                                            <span>Capital Devt.</span> <span  class="float-right">1,500.00</span><br>
                                            <h5>Total Assessment</h5 > <h5  class="float-right">27,470.35</h5><br><br>
                                            <span>Partial Payment</span> <span  class="float-right">6,278.25</span><br>
                                            <span>Total Balance</span> <span  class="float-right">21,192.10</span><br>
                                            <span>Prelim Due</span> <span  class="float-right">6,391.00</span><br>
                                            <span>Arrears/PN</span> <span  class="float-right">2,021.75</span><br>
                                            <span>Income Sharing - GEN EX</span> <span  class="float-right">625.58</span><br>
                                            <span>FINES & SURCHARGES - GENERAL</span> <span  class="float-right">200.00</span><br>
                                            <span>COLLEGE SPECIAL CLASS</span> <span  class="float-right">1,485.26</span><br>
                                            <span>COLLEGE YEARBOOK</span> <span  class="float-right">1,000.00</span><br>
                                            <span>VENDING BALANCE</span> <span id="vendingTotal" class="float-right"></span><br>
                                            <h5>Total</h5> <h5 id="totalPayment" class="float-right"></h5><br>
                                        </div>
                                    </div>
                                
                                </div>
                                
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" onClick="printStatement()">Print Statement</button>
                            <button type="submit" class="btn btn-success" onClick="updateStudent()">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
