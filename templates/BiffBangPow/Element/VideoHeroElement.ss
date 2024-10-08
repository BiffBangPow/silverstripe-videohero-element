<div class="hero-container <% if $BannerType == 'video' %>video-hero<% else %>image-hero<% end_if %>"
    <% if $BannerType == 'image' %>
     style="background-image: url('$HeroImage.ScaleMaxWidth(1920).Format('webp').Link');"
    <% end_if %>
>
    <div class="container content-holder">
        <div class="content">
            <% if $ShowTitle%>
                <h1 class="title mb-4">$Title</h1>
            <% end_if %>
            <% if $Content %>
                $Content
            <% end_if %>
            <% if $CTAType != 'None' %>
                <div class="cta my-4">
                    <p>
                        <a href="$CTALink" class="cta-link btn btn-primary"
                            <% if $CTAType == 'External' %>target="_blank" rel="noopener"
                            <% else_if $CTAType == 'Download' %>download
                            <% end_if %>>
                            $LinkText
                        </a>
                    </p>
                </div>
            <% end_if %>
        </div>
    </div>
    <% if $BannerType == 'video' && $VideoFile %>
        <video class="w-100"
            <% if $HeroImage %>
               poster="$HeroImage.ScaleMaxWidth(1920).Format('webp').URL"
            <% end_if %>
               autoplay playsinline muted loop>
            <source src="$VideoFile.URL" type="$VideoFile.MimeType">
        </video>
    <% end_if %>
</div>
