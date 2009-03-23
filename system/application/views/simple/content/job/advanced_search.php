<?=style('advanced-search.css')?>
<div id="navbar">
    <div class="breadcrumbs"><a rel="nofollow" href="<?=site_url()?>">Home</a> <span class="s">&gt;</span> <h1>Advanced Search</h1></div>
</div>
<div id="content">
    <form id="f_advanced_search" name="advanced_search" action="<?=site_url('job/search')?>" method="post">
        <input type="hidden" name="mode" value="advanced" />
        <div id="column_left">
            <div class="block" id="c_keywords">
                <h2>Keywords</h2>
                    <fieldset>
                        <div class="element">
                            <label for="keyword_all">with <strong>all</strong> the words:</label>
                            <input type="text" value="" name="keyword_all" class="text" id="keyword_all"/>
                        </div>
                        <div class="element">
                            <label for="keyword_within_job_title">within <strong>job title</strong>:</label>
                            <input type="text" value="" name="keyword_within_job_title" class="text" id="keyword_within_job_title"/>
                        </div>
                        <div class="element">
                            <label for="keyword_within_company_name">within <strong>company name</strong>:</label>
                            <input type="text" value="" name="keyword_within_company_name" class="text" id="keyword_within_company_name"/>
                        </div>
                    </fieldset>
            </div>
            <div class="block">
                <h2>Category & Location</h2>
                <fieldset>
                    <div class="element">
                        <label for="category_id">job category:</label>
                        <select name="category_id" id="category_id">
                            <option selected="" value="">-- show all --</option>
                            <?foreach($categories as $c) {?>
                                <option value="<?=$c['id']?>"><?=$c['name']?></option>
                            <?}?>
                        </select>
                    </div>
                    <div class="element">
                        <label for="location">location:</label>
                        <select name="location" id="location">
                            <option selected="" value="">-- show all --</option>
                            <?foreach($locations as $l) {?>
                                <option value="<?=$l['location']?>"><?=$l['location']?></option>
                            <?}?>
                        </select>
                    </div>
                </fieldset>
            </div>
            
            <div class="block">
                <h2>Preferences</h2>
                <fieldset>
                    <div class="element">
                        <label for="preference_perpage">number per page:</label>
                        <select name="preference_perpage" id="preference_perpage"><option selected="" value="10">10 results</option><option value="15">15 results</option><option value="25">25 results</option><option value="50">50 results</option></select>
                    </div>
                    <div class="element">
                        <label for="preference_sortby">sort jobs by:</label>
                        <select name="preference_sortby" id="preference_sortby"><option value="relevance">Relevance</option><option value="dd">Date</option></select>
                    </div>
                </fieldset>
            </div>
        </div>
        <div id="row_bottom">
            <div class="block" id="c_buttons">
                <input type="submit" value="search jobs" class="button"/>
                <input type="reset" value="clear" class="button"/>
            </div>
        </div>
    </form>
</div>        
