<div class="hero-container bg-cover $BannerType"
    <% if $BannerType == 'image' %>
     style="background-image: url('<% if $Page.WebPSupport %>$HeroImage.ScaleMaxWidth(1920).Format('webp').Link')<% else %>$HeroImage.ScaleMaxWidth(1920).Link')<% end_if %>;"
    <% end_if %>
>
    <div class="hero-overlay"></div>
    <div class="container content-holder">
        <div class="content">
            <% if $ShowTitle%>
                <h1 class="title">$Title</h1>
            <% end_if %>
            <% if $Content %>
                $Content
            <% end_if %>
        </div>
    </div>
    <% if $BannerType == 'video' && $VideoFile %>
        <video
            <% if $HeroImage %>
            poster="<% if $Page.WebPSupport %>
                $HeroImage.ScaleMaxWidth(1920).Format('webp').URL
            <% else %>
                $HeroImage.ScaleMaxWidth(1920).URL
            <% end_if %>"
            <% end_if %>
            autoplay playsinline muted loop>
            <source src="$VideoFile.URL" type="$VideoFile.MimeType">
        </video>
    <% end_if %>
</div>




