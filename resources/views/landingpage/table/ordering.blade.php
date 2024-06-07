<div class="mb-6">
    <h3 class="text-xl font-semibold mb-4">Ordering</h3>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="border py-2">No</th>
                    <th class="border py-2">Description</th>
                    <th class="border py-2">Weight</th>
                    <th class="border py-2">Score</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">1</td>
                    <td class="border px-4 py-2">
                        Do we provide the sufficient information against your order (product, delively date & other required information) ?<br>
                        貴社からの製品情報、配送時期等の問い合わせに対し、満足のいく回答（明確な情報提供）が出来ていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[0]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[0]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[0]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[0]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">2</td>
                    <td class="border px-4 py-2">
                        Do we ensure that we provide enough service and information to handle the issues in case the product stock is short and/or product has any defect, problems ?<br>
                        発注依頼のあった製品の在庫がない場合、確実に手配できるように対応していますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[1]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[1]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[1]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[1]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">3</td>
                    <td class="border px-4 py-2">
                        Are we quite flexible to responds to irregular<br>
                        situation ?<br>
                        イレギュラーな事態が発生した時に柔軟に対応出来ていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[2]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[2]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[2]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[2]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        Are the facilities for interchange of logistics<br>
                        information adequate?<br>
                        物流に関する情報交換が十分出来ていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[3]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[3]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[3]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[3]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">5</td>
                    <td class="border px-4 py-2">
                        Are your item and quantity order confirmed correctly?<br>
                        発注した内容（アイテム、数量）が弊社側で正しく確認されていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[4]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[4]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[4]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[4]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">6</td>
                    <td class="border px-4 py-2">
                        Do we confirm your orders immediately and export the required products on time in accordance with delivery schedule ?<br>
                        貴社からの発注に対し、すぐに回答していますか？また、納期通りに出荷出来ていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[5]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[5]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[5]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[5]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">7</td>
                    <td class="border px-4 py-2">
                        Are we informed about any amendment in<br>
                        quantities orders or cannot fullfill your requirement<br>
                        timely ?<br>
                        貴社から発注された製品の数量が出荷時に足りない場合に、すぐに情報提供できていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[6]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[6]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[6]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[6]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">8</td>
                    <td class="border px-4 py-2">
                        Are we explain you clearly if there are problems in<br>
                        the delivery of your orders?<br>
                        製品配送時に問題が発生した時に弊社から詳細の情報について提供していますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ordering_score[7]" value="NA" class="form-radio h-5 w-5" {{ old('ordering_score[7]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ordering_score[7]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ordering_score[7]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">9</td>
                    <td class="border px-4 py-2">
                        General rating:<br>
                        How do you rating the Product Information and<br>
                        Technical Requirements in general?<br>
                        ( The total score divided by total weight ) x 100 %<br>
                        総合採点：<br>
                        製品情報、及び技術要件について総合的に採点をして下さい。( 全体の点数で割った合計点）×100％<br>
                    </td>
                    <td class="border px-4 py-2">0</td>
                    <td class="border px-4 py-2">
                        <input type="number" name="ordering_total" id="ordering_total" placeholder="0" class="outline-none focus:outline-none" max="100">
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">10</td>
                    <td class="border px-4 py-2">
                        The improvement of Product Information and <br>
                        Technical Requirements :*) <br>
                        製品情報、及び技術要件に関し改善点がありましたらご記入下さい。<br>
                    </td>
                    <td class="border px-4 py-2">0</td>
                    <td class="border px-4 py-2">
                        Please Note the reason if the ordering_score not full, and if there is improvement/advice for our company :<br>
                        点数が満点（4点）でない場合の理由と改善点、ご意見等ございましたらご記入下さい。
                    </td>
                </tr>
            </tbody>
        </table>
</div>
