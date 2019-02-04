/**
*   API Service Functions
*   Version: 1.0.0;
*   Author: GalibWeb
*   Copyright: GalibWeb @ 2019
*/

$(document).ready(function() {

    'use strict';
    $(document).on('click', '#submitBtn', function(e) {
        e.preventDefault();
        var address = $('#address').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zip = $('#zip').val();
        city == '' ? $('.city-error').html('City is required') : $('.city-error').html('');
        address == '' ? $('.address-error').html('Address is required') : $('.address-error').html('');
        if(address != '' && city != '') {
            $.ajax({
                type: 'POST',
                url: 'execute.php',
                data: {address, city, state, zip},
                dataType: 'json',
                beforeSend: function() {
                    $('.form-show').hide();
                    $('.loading').show();
                },
                success: function(res) {
                    if(res.message.code == 0) {
                        var result = res.response.results.result;
                        $('.loading').hide();
                        if(Array.isArray(result)) {
                            result.forEach(element => {
                                showMultipleResult(element);
                            });
                        } else {
                            $('.data-show').show();
                            showResults(result);
                        }
                    } else if (res.message.code == 508) {
                        alert('Please enter a valid address.');
                        location.reload();
                    } else {
                        alert("Can't find you data. Please enter another address.");
                        location.reload();
                    }
                }
            });
        }
    });

    function showResults(res) {
        // Details output
        $(".full-address").html(res.address.street + ", " + res.address.city + ", " + res.address.state + ", " + res.address.zipcode);
        $(".property-id").html(res.zpid);
        $(".street-address").html(res.address.street);
        $(".city").html(res.address.city);
        $(".state").html(res.address.state);
        $(".zip").html(res.address.zipcode);
        $(".latitude").html(res.address.latitude);
        $(".longitude").html(res.address.longitude);
        $(".zestimate").html("$ " + toCommas(res.zestimate.amount));
        $(".rent-zestimate").html("$ " + toCommas(res.rentzestimate.amount) + " / month");
        
        // Facts and Features
        $(".type").html(res.useCode);
        $(".year-built").html(res.yearBuilt);
        $(".lot-sqft").html(res.lotSizeSqFt + " sqft");

        // Interior Features
        $(".bedrooms").html(res.bedrooms);
        $(".bathrooms").html(res.bathrooms);
        $(".flooring").html(toCommas(res.finishedSqFt) + " sqft");

        // Tax info
        $(".tax-val").html(res.taxAssessment);
        $(".tax-year").html(res.taxAssessmentYear);
    }

    function toCommas(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function showMultipleResult(res) {
        $('body').append(`
        <div class="container my-5">
			<div class="row">
                <div class="col-lg-8 offset-lg-2 multi-result">
                    <h1 class="text-center prop-id">Property ID: <span class="property-id">${res.zpid}</span></h1>
					<h2>Details</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Full Address of Property <span class="full-address">${res.address.street + ", " + res.address.city + ", " + res.address.state + ", " + res.address.zipcode}</span></td></tr>
							<tr><td>Street Address <span class="street-address">${res.address.street}</span></td></tr></tr>
							<tr><td>City <span class="city">${res.address.city}</span></td></tr>
							<tr><td>State <span class="state">${res.address.state}</span></td></tr>
							<tr><td>Zip Code <span class="zip">${res.address.zipcode}</span></td></tr>
							<tr><td>Latitude <span class="latitude">${res.address.latitude}</span></td></tr>
							<tr><td>Longitude <span class="longitude">${res.address.longitude}</span></td></tr>
							<tr><td>Estimated market value (USD) <span class="zestimate">$ ${toCommas(res.zestimate.amount)}</span></td></tr>
							<tr><td>Monthly Rent (USD) <span class="rent-zestimate">$ ${toCommas(res.rentzestimate.amount)} / month</span></td></tr>
						</tbody>
					</table>
					<h2>Facts and Features</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Type <span class="type">${res.useCode}</span></td></tr>
							<tr><td>Year Built <span class="year-built">${res.yearBuilt}</span></td></tr>
							<tr><td>Lot (sqft) <span class="lot-sqft">${toCommas(res.lotSizeSqFt)} sqft</span></td></tr>
						</tbody>
					</table>
					<h2>Interior Features</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Bedrooms <span class="bedrooms">${res.bedrooms}</span></td></tr>
							<tr><td>Bathrooms <span class="bathrooms">${res.bathrooms}</span></td></tr>
							<tr><td>Flooring (sqft) <span class="flooring">${toCommas(res.finishedSqFt)} sqft</span></td></tr>
						</tbody>
                    </table>
                    <h2>TAX Info</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Tax Assessment Value <span class="tax-val">${res.taxAssessment}</span></td></tr>
							<tr><td>Tax Assessment Year <span class="tax-year">${res.taxAssessmentYear}</span></td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>`);
    }

    // 2219 e peters colony, carrollton tx 75007

});