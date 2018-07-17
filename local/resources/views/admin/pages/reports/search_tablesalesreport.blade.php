  <table class="table table-striped table-bordered table-hover table-checkable order-column searchtablev"  id="sample_1" >
                                        <thead>
                                            <tr>
                                                <th  width="20%" class="text-center"> رقم الاوردر</th>
                                                <th class="text-center">التكلفه</th> 
                                                <th> اسم العميل</th>
                                                <th> التاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr class="odd gradeX">
                                                <td>{{$order->id}}</td>
                                                <td class="center">{{$order->total}}</td>
                                                <td class="center">{{$order->customerss->name}} </td>
                                                <td class="center"> {{ $order->created_at}}</td>
                                                
                                            </tr>
                                            @endforeach
                                            <!--ERROR-->
                                            
                                        
                                            <tr>
                                                <td> عدد الاوردرات</td>
                                                <td colspan="6" class="center"> {{$totals}} </td>
                                            </tr>
                                            <tr>
                                                <td> اجمالى عام</td>
                                                <td colspan="6" class="center"> {{$x}} </td>
                                            </tr>
                                         
                                           
                                        </tbody>
                                    </table>