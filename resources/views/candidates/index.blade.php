<x-app-layout>

    <div class="wrapper">
        @if (Auth::user()->type === 'Admin')
        @include('components.header')  
        @endif
        @if (Auth::user()->type === 'Employee')
        @include('components.user-header')  
        @endif
        <div class="content-wrapper">
            <section class="content">
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-3">
                                <div class="card-header">
                        <h3 class="card-title">Candidates</h3>
                            
                            <div class="card-tools">
                                                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" id="userDetails">                                                                              
                                            
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal for updating user details -->
                        <div class="modal fade" id="updateUserModal" tabindex="-1" aria-labelledby="updateUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateUserModalLabel">Update User Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="updateUserDetails">
                                        <!-- User details form -->
                                        
                                        <!-- End of user details form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                        <table class="table table-bordered text-nowrap border-collapse border">
                            <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Qualification</th>
                                <th>Industry</th>
                                <th>Department</th>
                                <th>Experience</th>                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                
                                    <tr>                                        
                                        <td>
                                            <button type="button" class="show-user-details" data-bs-toggle="modal" data-bs-target="#exampleModal" data-candidate-id="{{ $candidate->candidate_id }}">
                                                {{ $candidate->name }}
                                            </button>
                                        </td>
                                        <td>{{ $candidate->email }}</td>
                                        <td>{{ $candidate->city }}</td>
                                        <td>{{ $candidate->qualification->qualification_name}}</td>
                                        <td>{{ $candidate->industry->industry_name }}</td>
                                        <td>{{ $candidate->department->department_name }}</td>
                                        <td>{{ $candidate->experience }}</td>
                                        
                                    </tr>                                    
                                
                                @endforeach
                                
                            </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                </div>
            </section>
          </div>
      </div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.show-edit-user-modal').click(function(event) {
            var userId = $(this).data('user-id');
            event.preventDefault();
            $.ajax({
                url: '/users/' + userId + '/edit',
                type: 'GET',
                success: function(response) {
                    $('#updateUserDetails').html(response); // Update modal content with user details form
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        $('.show-user-details').click(function(event) {
            var candidateId = $(this).data('candidate-id');
            event.preventDefault();
            $.ajax({
                url: '/candidates/' + candidateId,
                type: 'GET',
                success: function(response) {
                    $('#userDetails').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>


</x-app-layout>