<!-- Block mymodule -->
<div class="config-container">
    <div class="header">
        <h4>Welcome to the configuration tab</h4>
        <span>Here you can select the different criteria you need to segment your client base</span>
    </div>

    <div class="roll-container">
        <div class="profile" onclick="displayDiv('profile')">
            <p>Profile</p>
        </div>
        <div class="hidden-div" id="profile">
            <form>
                <table>
                    <tr>
                        <td>Newletter (if enabled)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Opt in (if enabled)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby2[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby2[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Client group(s)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby3[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby3[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="multiselect">
                                <div class="selectBox" onclick="showCheckboxes('groups')">
                                    <select>
                                        <option>Groups</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="groups" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Group 2</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Group 2</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Group 2</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Group 2</span>
                                        </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Language(s)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby4[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby4[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="multiselect">
                                <div class="selectBox" onclick="showCheckboxes('languages')">
                                    <select>
                                        <option>Languages</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="languages" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>French</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>English</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Spanish</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Japanese</span>
                                        </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Currency/ies</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby5[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby5[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="multiselect">
                                <div class="selectBox" onclick="showCheckboxes('currencies')">
                                    <select>
                                        <option>Currencies)</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="currencies" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Euro</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Dollars</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Yen</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Pounds</span>
                                        </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Country/ies (for shipping)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby6[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby6[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="multiselect">
                                <div class="selectBox" onclick="showCheckboxes('countries')">
                                    <select>
                                        <option>Countries</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="countries" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>France</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Spain</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>England</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>United States</span>
                                        </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Age (if birth date field is enabled)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby7[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby7[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="from">
                                <span>From</span>
                                <input type="number" name="" min="1" max="99" value="20">
                            </div>
                            <div class="to">
                                <span>To</span>
                                <input type="number" name="" min="1" max="99" value="50">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Sexe (if asked)</td>
                        <td>
                            <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby8[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby8[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="multiselect">
                                <div class="selectBox" onclick="showCheckboxes('sexe')">
                                    <select>
                                        <option>Sexe</option>
                                    </select>
                                    <div class="overSelect"></div>
                                </div>
                                <div id="sexe" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Male</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Women</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Don't ask</span>
                                        </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <div class="roll-container2">
        <div class="behaviour" onclick="displayDiv('behaviour')">
            <p>Behaviour</p>
        </div>
        <div class="hidden-div under-hidden" id="behaviour">
            <div onclick="displayDiv('activity')" class="category-border">
                <p>Activity</p>
            </div>
                <div id="activity" class="detail-under-div">
                    <table>
                        <tr>
                            <td>Never ordered</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby10[1][]" />
                                    <span>Before</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby10[1][]" />
                                    <span>After</span>
                                </label>
                            </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Number of order</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby11[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby11[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="from">
                                    <span>Min</span>
                                    <input type="number" name="" value="10">
                                </div>
                                <div class="to">
                                    <span>Max</span>
                                    <input type="number" name="" value="50">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            <div onclick="displayDiv('purchases')" class="category-border">
                <p>Specific purchases & amounts</p>
            </div>
                <div id="purchases" class="detail-under-div">
                    <table>
                        <tr>
                            <td>Purchase (Category)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby12[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby12[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('categories')">
                                        <select>
                                            <option>Categories</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="categories" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Shirt</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Pants</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Jacket</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Hat</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Purchase (Brand)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby13[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby13[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('brands')">
                                        <select>
                                            <option>Brands</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="brands" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Nike</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Adidas</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Supreme</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Kiabi</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Purchase (Product)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby14[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby14[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('products')">
                                        <select>
                                            <option>Products</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="products" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>XXXXX</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>XXXXX</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>XXXXX</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>XXXXX</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Purchase (Amount)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby15[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby15[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="from">
                                    <span>Min</span>
                                    <input type="number" name="" value="10">
                                </div>
                                <div class="to">
                                    <span>Max</span>
                                    <input type="number" name="" value="500">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            <div onclick="displayDiv('abandoned')" class="category-border">
                <p>Abandoned carts</p>
            </div>
                <div id="abandoned" class="detail-under-div">
                    <table>
                        <tr>
                            <td>Abandoned carts (Category)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby16[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby16[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('abancarts')">
                                        <select>
                                            <option>Categories</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="abancarts" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Shirt</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Pants</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Jacket</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Hat</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Abandoned carts (Brands)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby17[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby17[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('abanbrands')">
                                        <select>
                                            <option>Brands</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="abanbrands" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Nike</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Adidas</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Supreme</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>Kiabi</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Abandoned carts (Products)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby18[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby18[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('abanproducts')">
                                        <select>
                                            <option>Products</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="abanproducts" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Test1</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Test2</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Test67</span>
                                        </label>
                                        <label for="four">
                                            <input type="checkbox" id="four" /><span>testlol</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Abandoned carts (Amount)</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby19[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby19[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="from">
                                    <span>Min</span>
                                    <input type="number" name="" value="10">
                                </div>
                                <div class="to">
                                    <span>Max</span>
                                    <input type="number" name="" value="500">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            <div onclick="displayDiv('habits')" class="category-border">
                <p>Habits</p>
            </div>
                <div id="habits" class="detail-under-div">
                    <table>
                        <tr>
                            <td>Payment methods</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby20[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby20[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('payment')">
                                        <select>
                                            <option>Methods</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="payment" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Credit Card</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Paypal</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Western Union</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Delivery methods</td>
                            <td>
                                <div>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby21[1][]" />
                                    <span>Is</span>
                                </label>
                                <label class="isnot">
                                    <input type="checkbox" class="radio" value="1" name="fooby21[1][]" />
                                    <span>Is not</span>
                                </label>
                            </div>
                            </td>
                            <td>
                                <div class="multiselect">
                                    <div class="selectBox" onclick="showCheckboxes('delivery')">
                                        <select>
                                            <option>Methods</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="delivery" class="checkboxes">
                                        <label for="one">
                                            <input type="checkbox" id="one" /><span>Express</span>
                                        </label>
                                        <label for="two">
                                            <input type="checkbox" id="two" /><span>Common</span>
                                        </label>
                                        <label for="three">
                                            <input type="checkbox" id="three" /><span>Teleportation</span>
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>

    <div class="search-container">
        <button class="button-search" onclick="displayResult()">Search</button>
    </div>

    <div class="display-result-container">
        <p id="resulttext">
            {if isset($searchResult) && $searchResult}
              {$searchResult}
            {else}
              No
            {/if}
            results available with the selected criteria.
        </p>
    </div>

    <div class="option-container">
        <div class="list">
            Show the list
        </div>
        <div class="csv">
            Export in CSV
        </div>
    </div>

    <script type="text/javascript">
        function displayDiv(div) {
            if (document.getElementById(div).style.display == 'none') {
                document.getElementById(div).style.display = 'block';
            } else {
                document.getElementById(div).style.display = 'none';
            }
        }

        function displayResult() {
            document.getElementById("resulttext").style.display = 'block';
        }

        var expanded = false;

        function showCheckboxes(name) {
            var checkboxes = document.getElementById(name);
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }

        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script>

</div>
<!-- /Block mymodule -->