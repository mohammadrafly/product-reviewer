<div class="mb-6">
    <h3 class="text-xl font-semibold mb-4">Product Information and Technical Requirements</h3>
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
                        Did you receive the necessary information for setting up new product timely and we follow up your requirement immediately?<br>
                        新規品の立ち上げの必要な情報を適時、受取れていますか？また、そちらからの要望に対し、速やかに対応していますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="pit_score[0]" value="NA" class="form-radio h-5 w-5" {{ old('pit_score[0]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="pit_score[0]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('pit_score[0]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">2</td>
                    <td class="border px-4 py-2">
                        Are the actual product comply with product standard that are required?<br>
                        実際の製品は要求された製品規格に沿っていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="pit_score[1]" value="NA" class="form-radio h-5 w-5" {{ old('pit_score[1]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="pit_score[1]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('pit_score[1]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">3</td>
                    <td class="border px-4 py-2">
                        Are the actual schedule comply with new item product planning?<br>
                        新規品立ち上げのスケジュール通りに実施出来ていますか？
                    </td>
                    <td class="border px-4 py-2">4</td>
                    <td class="border px-4 py-2">
                        <div class="flex space-x-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="pit_score[2]" value="NA" class="form-radio h-5 w-5" {{ old('pit_score[2]')  ? 'checked' : '' }}>
                                <span class="ml-2">NA</span>
                            </label>
                            @for ($score = 1; $score <= 4; $score++)
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="pit_score[2]" value="{{ $score }}" class="form-radio h-5 w-5" {{ old('pit_score[2]') == (string)$score ? 'checked' : '' }}>
                                        <span class="ml-2">{{ $score }}</span>
                                    </label>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">4</td>
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
                        <input type="number" name="pit_total" id="pit_total" placeholder="0" class="outline-none focus:outline-none" max="100">
                    </td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">5</td>
                    <td class="border px-4 py-2">
                        The improvement of Product Information and <br>
                        Technical Requirements :*) <br>
                        製品情報、及び技術要件に関し改善点がありましたらご記入下さい。<br>
                    </td>
                    <td class="border px-4 py-2">0</td>
                    <td class="border px-4 py-2">
                        Please Note the reason if the pit_score not full, and if there is improvement/advice for our company :<br>
                        点数が満点（4点）でない場合の理由と改善点、ご意見等ございましたらご記入下さい。
                    </td>
                </tr>
            </tbody>
        </table>
</div>
