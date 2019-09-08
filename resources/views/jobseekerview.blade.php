                  <table class="table table-striped">
                         <thead>
                         <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Web Address</th>
                            <th>Like working</th>
                            <th>View profile</th>
               
                         </tr>
                         </thead>
                         <tbody>
                            @foreach($jobseekers as $k => $jobseeker) 
                        
                            <tr>
                               <td>{{ $k+1 }}</td>
                               <td>{{ $jobseeker->name }}</td>
                               <td>{{ $jobseeker->email }}</td>
                               <td>{{ $jobseeker->webaddress }}</td>
                               <td>{{ $jobseeker->like_working }}</td>
                                <td>
                              <form method="get" action="{{url('profileview')}}/{{ $jobseeker->id }}" >
                                <input type="hidden" name="csrf" value="{{ csrf_token() }}">
                                <button class="openprofile" class="btn btn-default" value='{{ $jobseeker->id }}'>
                                <span class="glyphicon glyphicon-search" ></span>
                            </button>
                            </form>
                              </td>
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
