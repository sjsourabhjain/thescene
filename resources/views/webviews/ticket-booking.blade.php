@include('webviews/header')
<div class="container">
    <div class="row">
        <div class="left-box">
            <h2>{{$event->title}}</h2>
            <p>{{ date('D, M d, Y, H:i a', strtotime($event->start_datetime)) }}</p>
            <table>
                <tr>
                    <th>General Admission
                        <p>Free</p>
                        <p>Sales end on Nov 28, 2022</p>
                    </th>
                    <th style="text-align: right;">
                        <form action="#">
                            <select>
                                <option></option>
                                <option>VIP</option>
                                <option>General</option>
                            </select>
                            <select name="numbers" id="numbers">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </form>
                    </th>
            </table>
            <div class="register-btn">
                <a class="btn popup-btn btn-main-md" href="/login">Login</a>
            </div>
        </div>
        <div class="right-box">
            <img src="images/event/img-a.png">
            <h5>Order Summary</h5>
            <table>
                <tr>
                    <th>{{$event->title}}</th>
                    <th style="text-align: right;">
                        $0.00
                    </th>
                <tr>
                    <td>Total</td>
                    <td style="text-align: right;">$0.00</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@include('webviews/footer')