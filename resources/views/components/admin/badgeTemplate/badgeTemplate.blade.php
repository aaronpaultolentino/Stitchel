<div style="border: none;width: {{ $badgeDesign['width'] }}in;height: 99%;position: relative;page-break-after: always; overflow:hidden;" class="badge-item">
    <div style="height: .75in; position: absolute; bottom: 1.5in; left: 0; right: 0; padding-left: 0.1in; padding-right: .9in;">
      <div style="font-size: {{ $badgeDesign['name_size'] }}px;font-weight:{{ $badgeDesign['name_weight'] }};font-family: {{ $badgeDesign['font'] }}" class="badgeName">{{ $badgeName }}</div>
      <div style="font-size: {{ $badgeDesign['title_size'] }}px;font-weight:{{ $badgeDesign['title_weight'] }};font-family: {{ $badgeDesign['font'] }}" class="badgeTitle">{{ $badgeTitle }}</div>
      <div style="font-size: {{ $badgeDesign['subtitle_size'] }}px;font-weight:{{ $badgeDesign['subtitle_weight'] }};font-family: {{ $badgeDesign['font'] }} " class="badgeSubTitle">{{ $badgeSubTitle }}</div>
    </div>
    <div style="position: absolute; bottom: 1.5in; right: 0.2in;">
        <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{ $qr_code }}" style="border: 0px  ; width: 0.7in; height: 0.7in; margin: 0; padding: 0;" alt="{{ $qr_code }}.png" class="badgeQrCode">
    </div>    
</div>