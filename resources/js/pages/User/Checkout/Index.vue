<template>
<Head title="Checkout Index" />
<UserLayout>
    <div class="w-full px-6 py-6 mx-auto">
        <!-- table 1 -->

        <!-- Success Messege -->
        <Notifications />

        <form @submit.prevent="submit" role="form">
            <div class="grid grid-cols-3 gap-4">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div
                            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <h6>Upgrade/Renewel Plan</h6>
                            </div>
                            <div class="p-6 flex-auto">
                                <div class="grid grid-cols-12 font-bold text-medium text-slate-700 bg-slate-100/50 py-2 px-5 rounded border-b-2 border-gray-300">
                                    <div class="col-span-8">Description</div>
                                    <div class="col-span-4">Price</div>
                                </div>

                                <div class="grid grid-cols-12 font-medium text-sm text-slate-500 border-b border-gray-300 py-2 px-5">
                                    <div class="col-span-8">{{ selected_plan.plan_name }} - {{ selected_plan.validity }} Days</div>
                                    <div class="col-span-4">${{ selected_plan.plan_price == '0' ? 0 : formatNumber((selected_plan.plan_price) * (selected_plan.validity / 30)) }}</div>
                                </div>

                                <div v-if="config[25].config_value > 0" class="grid grid-cols-12 font-medium text-sm text-slate-500 border-b border-gray-300 py-2 px-5">
                                    <div class="col-span-8">{{ config[24].config_value }}</div>
                                    <div class="col-span-4">${{ formatNumber(((selected_plan.plan_price * config[25].config_value) / 100) * (selected_plan.validity / 30)) }}</div>
                                </div>

                                <div class="grid grid-cols-12 font-bold text-sm text-slate-700 py-2 px-5">
                                    <div class="col-span-8">Total Payable</div>
                                    <div class="col-span-4">${{ formatNumber(total) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-full max-w-full px-3">
                            <div
                                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <h6>Billing Details</h6>
                                </div>
                                <div class="p-6 flex-auto">
                                    <div class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-6">
                                        <div class="sm:col-span-3 ml-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_name">Full Name<span class="text-red-600"> *</span></Label>
                                            <input
                                                v-model="form.billing_name"
                                                name="billing_name"
                                                id="billing_name"
                                                placeholder="Full Name ..."
                                                ref="input"
                                                required
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            />
                                        </div>
                                        <div class="sm:col-span-3 mr-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_email">Email<span class="text-red-600"> *</span></Label>
                                            <input
                                                v-model="form.billing_email"
                                                name="billing_email"
                                                id="billing_email"
                                                placeholder="Email ..."
                                                ref="input"
                                                required
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-6">
                                        <div class="sm:col-span-6 ml-2 mr-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_address">Address<span class="text-red-600"> *</span></Label>
                                            <textarea
                                                v-model="form.billing_address"
                                                name="billing_address"
                                                id="billing_address"
                                                placeholder="Address ..."
                                                ref="input"
                                                required rows="2"
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-6">
                                        <div class="sm:col-span-3 ml-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_phone">Phone<span class="text-red-600"> *</span></Label>
                                            <input
                                                v-model="form.billing_phone"
                                                name="billing_phone"
                                                id="billing_phone"
                                                placeholder="Phone ..."
                                                ref="input"
                                                required
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            />
                                        </div>
                                        <div class="sm:col-span-3 mr-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_city">City<span class="text-red-600"> *</span></Label>
                                            <input
                                                v-model="form.billing_city"
                                                name="billing_city"
                                                id="billing_city"
                                                placeholder="City ..."
                                                ref="input"
                                                required
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-6">
                                        <div class="sm:col-span-3 ml-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_state">Billing State/Province<span class="text-red-600"> *</span></Label>
                                            <input
                                                v-model="form.billing_state"
                                                name="billing_state"
                                                id="billing_state"
                                                placeholder="Billing State/Province ..."
                                                ref="input"
                                                required
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            />

                                        </div>
                                        <div class="sm:col-span-3 mr-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_zipcode">Postal Code<span class="text-red-600"> *</span></Label>
                                            <input
                                                v-model="form.billing_zipcode"
                                                name="billing_zipcode"
                                                id="billing_zipcode"
                                                placeholder="Billing Zip Code ..."
                                                ref="input"
                                                required
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                            />
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 gap-6 mb-5 sm:grid-cols-6">
                                        <div class="sm:col-span-3 ml-2">
                                            <Label class="mb-2 ml-1 font-bold text-xs text-slate-700" for="billing_country">Country<span class="text-red-600">*</span></Label>
                                            <select
                                                class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                v-model="form.billing_country" id="billing_country" name="billing_country" required>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="col-start-2 col-span-2 mt-8">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-full max-w-full px-3">
                            <div
                                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                    <h6>Payment Method</h6>
                                </div>
                                <div class="p-6 flex-auto">
                                    <div class="grid grid-cols-6 gap-4">
                                        <div class="col-start-1 col-span-3 px-2">
                                            <div v-for="gateway in gateways" class="flex gap-1 p-7 w-full border-2 border-gray-300 rounded hover:border-fuchsia-300 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow">
                                                <div class="flex items-center">
                                                    <input
                                                        @input="paymentGateway(gateway.id)"
                                                        name="payment_gateway_id"
                                                        id="payment_gateway_id"
                                                        placeholder="Billing Zip Code ..."
                                                        ref="input"
                                                        required
                                                        type="radio"
                                                        class="h-4 w-4 mr-2 border-gray-300 focus:ring-2 focus:ring-blue-300"
                                                        aria-labelledby="payment_gateway_id" aria-describedby="payment_gateway_id"
                                                    >
                                                </div>
                                                <img :src="$page.props.imagePath + 'img/payments/visacard.png'" class="w-8 h-3 mt-1" />
                                                <img :src="$page.props.imagePath + 'img/payments/master.png'" class="w-8 h-5" />
                                                <img :src="$page.props.imagePath + 'img/payments/american.png'" class="w-8 h-5" />
                                                <span class="text-xs mt-1 font-bold">Credit / Debit Card</span>
                                            </div>
                                            <div class="flex items-center justify-start mt-4">
                                                <PrimaryButton :class="{ 'opacity-25': form.processing }"
                                                    :disabled="form.processing">
                                                    Continue For Payment
                                                </PrimaryButton>
                                            </div>
                                        </div>
                                        <div class="col-end-7 col-span-2">
                                            <div class="flex gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path>
                                                    <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
                                                    <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
                                                </svg>
                                                <span class="text-sm font-bold mb-1">SECURE PAYMENT</span>
                                            </div>
                                            <p class="text-sm mb-1 font-bold">Accepted payment methods</p>
                                            <div class="flex gap-1 ml-6">
                                                <img :src="$page.props.imagePath + 'img/payments/visacard.png'" class="w-8 h-3 mt-1" />
                                                    <img :src="$page.props.imagePath + 'img/payments/master.png'" class="w-8 h-5" />
                                                    <img :src="$page.props.imagePath + 'img/payments/american.png'" class="w-8 h-5" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</UserLayout>
</template>

<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const page = usePage();

const props = defineProps({
    settings: Object,
    currency: Object,
    selected_plan: Object,
    gateways: Object,
    config: Object,
    total: Object
});

const form = useForm({
    billing_name: page.props.auth.user.billing_name,
    billing_email: page.props.auth.user.billing_email,
    billing_address: page.props.auth.user.billing_address,
    billing_phone: page.props.auth.user.billing_phone,
    billing_city: page.props.auth.user.billing_city,
    billing_state: page.props.auth.user.billing_state,
    billing_zipcode: page.props.auth.user.billing_zipcode,
    billing_country: page.props.auth.user.billing_country ? page.props.auth.user.billing_country : 'Afghanistan',
    payment_gateway_id: ''
});

function paymentGateway(id) {
    form.payment_gateway_id = id
};

const submit = () => {
    form.post(route('prepare.payment.gateway', props.selected_plan.id));
};

</script>

<script>

export default {
    methods: {
        formatNumber(number) {
            return Number(number).toFixed(2);
        },
    }
}

</script>
