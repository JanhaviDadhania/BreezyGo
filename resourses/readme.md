## Resources
 
- for solr indexing https://lucene.apache.org/solr/7_0_0/quickstart.html
- for scrapy https://www.geeksforgeeks.org/implementing-web-scraping-python-scrapy/


#### other important links for issues

- creating new core https://stackoverflow.com/questions/29070505/how-to-create-new-core-in-solr-5
- json file issue https://stackoverflow.com/questions/58680463/empty-json-file-after-crawling-using-scrapy

##### start solr query interface using following link

http://localhost:8983/#/NAME_OF_YOUR_CORE/query
here jcg.
url: http://localhost:8983/solr/#/jcg/query


## few important commands

### Start solr

Start solr using by typing ```$bin/solr start ```.

### to create solr core 
Navigate /solr-7.3.1 folder <br/>
Create solr core using command  <br/><br/>
```$ bin/solr create -c <name>```
<br/><br/>

### to crawl new data

Nevigate to solr-7.3.1/mycrawler/crawler folder in terminal and type<br/><br/>
```$scrapy crawl NAME_OF_SCRAPY_SPIDER -o links.json```<br/><br/>
Here name of project is extract.<br/><br/>
```$scrapy crawl extract -o links.json```<br/><br/>

On executing this command spider will crawl and store all the url in links.json file.


### Indexing 

If you crawl the urls then you should index it as well so that the data can be displayed in BreezyGo.

<br/><br/>Navigate to solr-7.3.1.  We now have to do indexing.<br/><br/>
Type the following command in terminal.<br/><br/>
```$bin/post -c NAME_OF_SOLR_CORE mycrawler/crawler/l.json```

<br/><br/>

This will index the file l.json. 
Here core name is jcg.
<br/></br>

```$bin/post -c jcg mycrawler/crawler/l.json```

<br/><br/>


### Understanding solr

Now, type http://localhost:8983/solr/# in your browser. Nevigate to jcg/query. Here jcg is solr core name.<br/>
If you want to see all result do not change anything and click execute query.
This will display indexed result as result.
