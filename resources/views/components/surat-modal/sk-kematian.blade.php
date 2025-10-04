<div class="relative w-full p-6 bg-white rounded-lg place-self-center md:max-w-md lg:max-w-4xl md:p-10">
    <div class="space-y-8">
        <h5 class="text-3xl font-semibold capitalize">
            surat keterangan kematian
        </h5>
        <form wire:submit.prevent="submit" class="space-y-10">
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data diri
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="name" class="font-medium">
                            Nama lengkap
                        </label>
                        <div>
                            <input type="text"
                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="name" wire:model="name">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="place-of-birth" class="font-medium">
                            Tempat lahir
                        </label>
                        <div>
                            <input type="text"
                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="place-of-birth" wire:model="placeOfBirth">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="day-of-birth" class="font-medium">
                            Tanggal lahir
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <select
                                        class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                        id="day-of-birth" wire:model="dayOfBirth">
                                        <option value=""></option>
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
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <select
                                        class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                        id="month-of-birth" wire:model="monthOfBirth">
                                        <option value=""></option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div>
                                    <select
                                        class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                        id="year-of-birth" wire:model="yearOfBirth">
                                        <option value=""></option>
                                        <option value="1900">1900</option>
                                        <option value="1901">1901</option>
                                        <option value="1902">1902</option>
                                        <option value="1903">1903</option>
                                        <option value="1904">1904</option>
                                        <option value="1905">1905</option>
                                        <option value="1906">1906</option>
                                        <option value="1907">1907</option>
                                        <option value="1908">1908</option>
                                        <option value="1909">1909</option>
                                        <option value="1910">1910</option>
                                        <option value="1911">1911</option>
                                        <option value="1912">1912</option>
                                        <option value="1913">1913</option>
                                        <option value="1914">1914</option>
                                        <option value="1915">1915</option>
                                        <option value="1916">1916</option>
                                        <option value="1917">1917</option>
                                        <option value="1918">1918</option>
                                        <option value="1919">1919</option>
                                        <option value="1920">1920</option>
                                        <option value="1921">1921</option>
                                        <option value="1922">1922</option>
                                        <option value="1923">1923</option>
                                        <option value="1924">1924</option>
                                        <option value="1925">1925</option>
                                        <option value="1926">1926</option>
                                        <option value="1927">1927</option>
                                        <option value="1928">1928</option>
                                        <option value="1929">1929</option>
                                        <option value="1930">1930</option>
                                        <option value="1931">1931</option>
                                        <option value="1932">1932</option>
                                        <option value="1933">1933</option>
                                        <option value="1934">1934</option>
                                        <option value="1935">1935</option>
                                        <option value="1936">1936</option>
                                        <option value="1937">1937</option>
                                        <option value="1938">1938</option>
                                        <option value="1939">1939</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="religion" class="font-medium">
                            Agama
                        </label>
                        <div>
                            <select
                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="religion" wire:model="religion">
                                <option value=""></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="profession" class="font-medium">
                            Profesi
                        </label>
                        <div>
                            <input type="text"
                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="profession" wire:model="profession">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="address" class="font-medium">
                            Alamat lengkap
                        </label>
                        <div>
                            <textarea
                                class="w-full min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="address" wire:model="address"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <h5 class="text-xl font-semibold capitalize">
                    data keterangan kematian
                </h5>
                <div class="grid grid-cols-1 gap-6 gap-x-0 lg:gap-x-10 lg:grid-cols-2">
                    <div class="space-y-2">
                        <label for="place-of-death" class="font-medium">
                            Tempat kematian
                        </label>
                        <div>
                            <input type="text"
                                class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="place-of-death" wire:model="placeOfDeath">

                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="day-of-death" class="font-medium">
                            Tanggal kematian
                        </label>
                        <div>
                            <div class="flex items-center space-x-3">
                                <div>
                                    <select
                                        class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                        id="day-of-death" wire:model="dayOfDeath">
                                        <option value=""></option>
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
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                    </select>
                                </div>
                                <div class="flex-1">
                                    <select
                                        class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                        id="month-of-death" wire:model="monthOfDeath">
                                        <option value=""></option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div>
                                    <select
                                        class="w-full text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                        id="year-of-death" wire:model="yearOfDeath">
                                        <option value=""></option>
                                        <option value="1900">1900</option>
                                        <option value="1901">1901</option>
                                        <option value="1902">1902</option>
                                        <option value="1903">1903</option>
                                        <option value="1904">1904</option>
                                        <option value="1905">1905</option>
                                        <option value="1906">1906</option>
                                        <option value="1907">1907</option>
                                        <option value="1908">1908</option>
                                        <option value="1909">1909</option>
                                        <option value="1910">1910</option>
                                        <option value="1911">1911</option>
                                        <option value="1912">1912</option>
                                        <option value="1913">1913</option>
                                        <option value="1914">1914</option>
                                        <option value="1915">1915</option>
                                        <option value="1916">1916</option>
                                        <option value="1917">1917</option>
                                        <option value="1918">1918</option>
                                        <option value="1919">1919</option>
                                        <option value="1920">1920</option>
                                        <option value="1921">1921</option>
                                        <option value="1922">1922</option>
                                        <option value="1923">1923</option>
                                        <option value="1924">1924</option>
                                        <option value="1925">1925</option>
                                        <option value="1926">1926</option>
                                        <option value="1927">1927</option>
                                        <option value="1928">1928</option>
                                        <option value="1929">1929</option>
                                        <option value="1930">1930</option>
                                        <option value="1931">1931</option>
                                        <option value="1932">1932</option>
                                        <option value="1933">1933</option>
                                        <option value="1934">1934</option>
                                        <option value="1935">1935</option>
                                        <option value="1936">1936</option>
                                        <option value="1937">1937</option>
                                        <option value="1938">1938</option>
                                        <option value="1939">1939</option>
                                        <option value="1940">1940</option>
                                        <option value="1941">1941</option>
                                        <option value="1942">1942</option>
                                        <option value="1943">1943</option>
                                        <option value="1944">1944</option>
                                        <option value="1945">1945</option>
                                        <option value="1946">1946</option>
                                        <option value="1947">1947</option>
                                        <option value="1948">1948</option>
                                        <option value="1949">1949</option>
                                        <option value="1950">1950</option>
                                        <option value="1951">1951</option>
                                        <option value="1952">1952</option>
                                        <option value="1953">1953</option>
                                        <option value="1954">1954</option>
                                        <option value="1955">1955</option>
                                        <option value="1956">1956</option>
                                        <option value="1957">1957</option>
                                        <option value="1958">1958</option>
                                        <option value="1959">1959</option>
                                        <option value="1960">1960</option>
                                        <option value="1961">1961</option>
                                        <option value="1962">1962</option>
                                        <option value="1963">1963</option>
                                        <option value="1964">1964</option>
                                        <option value="1965">1965</option>
                                        <option value="1966">1966</option>
                                        <option value="1967">1967</option>
                                        <option value="1968">1968</option>
                                        <option value="1969">1969</option>
                                        <option value="1970">1970</option>
                                        <option value="1971">1971</option>
                                        <option value="1972">1972</option>
                                        <option value="1973">1973</option>
                                        <option value="1974">1974</option>
                                        <option value="1975">1975</option>
                                        <option value="1976">1976</option>
                                        <option value="1977">1977</option>
                                        <option value="1978">1978</option>
                                        <option value="1979">1979</option>
                                        <option value="1980">1980</option>
                                        <option value="1981">1981</option>
                                        <option value="1982">1982</option>
                                        <option value="1983">1983</option>
                                        <option value="1984">1984</option>
                                        <option value="1985">1985</option>
                                        <option value="1986">1986</option>
                                        <option value="1987">1987</option>
                                        <option value="1988">1988</option>
                                        <option value="1989">1989</option>
                                        <option value="1990">1990</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                        <option value="1995">1995</option>
                                        <option value="1996">1996</option>
                                        <option value="1997">1997</option>
                                        <option value="1998">1998</option>
                                        <option value="1999">1999</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label for="couse-of-death" class="font-medium">
                            Penyebab kematian
                        </label>
                        <div>
                            <textarea
                                class="w-full min-h-[100px] text-black transition border rounded-md focus:ring-4 focus:ring-slate-200/75 border-slate-700 focus:border-black"
                                id="couse-of-death" wire:model="couseOfDeath"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="space-y-2">
                    <button type="submit"
                        class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition bg-green-600 border border-green-600 rounded-md hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75 disabled:bg-opacity-60 disabled:border-green-600/60 disabled:hover:bg-opacity-60"
                        wire:target="submit" wire.loading.attr.disabled="">
                        <span class="font-medium tracking-wide">
                            Buat surat keterangan
                        </span>
                        <svg wire:loading="" wire:target="submit" xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 animate-spin" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="6" x2="12" y2="3"></line>
                            <line x1="16.25" y1="7.75" x2="18.4" y2="5.6"></line>
                            <line x1="18" y1="12" x2="21" y2="12"></line>
                            <line x1="16.25" y1="16.25" x2="18.4" y2="18.4"></line>
                            <line x1="12" y1="18" x2="12" y2="21"></line>
                            <line x1="7.75" y1="16.25" x2="5.6" y2="18.4"></line>
                            <line x1="6" y1="12" x2="3" y2="12"></line>
                            <line x1="7.75" y1="7.75" x2="5.6" y2="5.6"></line>
                        </svg>
                    </button>
                    <div class="block md:hidden">
                        <a href="#" wire:click.prevent="close()"
                            class="block w-full px-4 py-2 space-x-2 text-center text-white transition border rounded-md bg-slate-600 border-slate-600 hover:bg-opacity-90 focus:ring-4 focus:focus:ring-slate-200/75">
                            <span class="font-medium tracking-wide">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
