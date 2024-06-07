<div class="mb-6">
    <h3 class="text-xl font-semibold mb-4">Complaint Handling</h3>
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
                        Do we respond quickly on your complaint?<br>
                        苦情に対し、迅速に対応をしていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ch_score[0]" value="NA" class="form-radio h-5 w-5" {{ old('ch_score[0]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ch_score[0]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ch_score[0]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">2</td>
                    <td class="border px-4 py-2">
                        Do we give you the corrective action for the<br>
                        complaint to make your satisfactions?<br>
                        苦情に対し、貴社が満足がいくような改善対策が取られていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="ch_score[1]" value="NA" class="form-radio h-5 w-5" {{ old('ch_score[1]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="ch_score[1]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('ch_score[1]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">3</td>
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
                        <input type="number" name="ch_total" id="ch_total" placeholder="0" class="outline-none focus:outline-none" max="100">
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        The improvement of Product Information and <br>
                        Technical Requirements :*) <br>
                        製品情報、及び技術要件に関し改善点がありましたらご記入下さい。<br>
                    </td>
                    <td class="border px-4 py-2">0</td>
                    <td class="border px-4 py-2">
                        Please Note the reason if the ch_score not full, and if there is improvement/advice for our company :<br>
                        点数が満点（4点）でない場合の理由と改善点、ご意見等ございましたらご記入下さい。
                    </td>
                </tr>
            </tbody>
        </table>
</div>
