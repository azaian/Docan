<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>اسم العميل</th>
                                                <th> رقم الاوردر</th>  
                                                <th> اجمالى المبلغ</th>
                                                <th> كوبون الخصم</th>
                                                <th> التاريخ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr class="odd gradeX">
                                                <td>{{$order->customers->name}}</td>
                                              
                                                <td class="center">{{$order->id}}</td>
                                                <td class="center">{{$order->total}} </td>
                                                <td class="center"> 50</td>
                                                <td class="center"> {{$order->created_at}}</td>
                                                
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td>اجمالى المدفوع</td>
                                                <td colspan="6"></td> 
                                            </tr>
                                           
                                        </tbody>
</table>