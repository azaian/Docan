 <table class="table table-striped table-bordered table-hover table-checkable order-column allagenttable" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>اسم العميل</th>
                                                <th> عدد الاوردرات</th>  
                                               
                                                <th> اجمالى المبلغ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                           <tr class="odd gradeX">
                                                <td>{{$customer->name}}</td>
                                                <?php
                                                        $y=0;
                                                        $m=0;
                                                        $names=$customer->id;
                                                        $orders=App\Order::where('customer_id',$names)->get();
                                                        foreach ($orders as $order) {
                                                           $y+=$order->total;
                                                           
                                                    }
                                                    $totals=$orders->count();

                                                ?>
                                                <td class="center">{{$totals}}</td>
                                               <td class="center">{{$y}}</td>
                                             </tr>
                                            
                                            @endforeach
                                           
                                        </tbody>
                                    </table>