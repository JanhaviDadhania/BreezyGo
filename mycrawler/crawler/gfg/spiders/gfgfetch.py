# importing the scrapy module 
import scrapy 
from gfg.items import GfgItem
  
class ExtractUrls(scrapy.Spider): 
    name = "extract"
  
    # request function 
    def start_requests(self): 
        urls = [ 'https://cwiki.apache.org/confluence/display/nutch/NutchTutorial', ] 
          
        for url in urls: 
            yield scrapy.Request(url = url, callback = self.parse) 
  
    # Parse function 
    def parse(self, response): 
          
        # Extra feature to get title 
        title = response.css('title::text').extract_first()  
          
        # Get anchor tags 
        links = response.css('a::attr(href)').extract() 
             
          
        for link in links: 
            item = GfgItem()
            item["title"] = title
            item["name"] = link
            
            yield item
        #    yield 
        #    { 
        #        'title': title, 
        #        'links': link 
        #    } 
         

        
     
            
