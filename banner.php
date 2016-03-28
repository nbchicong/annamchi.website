                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
							<!-- BEGIN Block search module TOP -->
                            <div id="search_block_top">
                                <form method="get" action="index.php" id="searchbox">
                                    <div class="extra_input">
										<input type="hidden" name="page" value="resultSearch">
                                        <input class="search_query" id="search_query_top" name="KeyWord" value="Nhập từ cần tìm..." onfocus="if(this.value=='Nhập từ cần tìm...')this.value='';" onblur="if(this.value=='')this.value='Nhập từ cần tìm...';" type="text">
                                    </div><a href="javascript:document.getElementById('searchbox').submit();">Tìm kiếm</a>
                                </form>
                            </div>
                            <script type="text/javascript">
/*
								// <![CDATA[
                                $('document').ready(function(){
                                    $("#search_query_top").autocomplete('index.php', {
                                        minChars: 3,
                                        max: 10,
                                        width: 500,
                                        selectFirst: false,
                                        scroll: false,
                                        dataType: "json",
                                        formatItem: function(data, i, max, value, term){
                                            return value;
                                        },
                                        parse: function(data){
                                            var mytab = new Array();
                                            for (var i = 0; i < data.length; i++) 
                                                mytab[mytab.length] = {
                                                    data: data[i],
                                                    value: data[i].cname + ' > ' + data[i].pname
                                                };
                                            return mytab;
                                        },
                                        extraParams: {
                                            ajaxSearch: 1,
                                            id_lang: 1
                                        }
                                    }).result(function(event, data, formatted){
                                        $('#search_query_top').val(data.pname);
                                        document.location.href = data.product_link;
                                    })
                                });
                                // ]]>
*/
                            </script>
                            <!-- END Block search module TOP -->