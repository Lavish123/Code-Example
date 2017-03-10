

<script type="text/javascript">
$.getJSON('http://gdata.youtube.com/feeds/api/users/benpearlmagic/uploads?alt=json', function(data) {
    console.log(data);
    for(var i in data.feed.entry) {
      console.log("Title : "+data.feed.entry[i].title.$t); // title
      console.log("Description : "+data.feed.entry[i].content.$t); // description
    }
});
</script>
