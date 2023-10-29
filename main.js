
    function getArabicDate() {
        const days = ['الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'];
        const months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
    
        const today = new Date();
        const month = today.getMonth();
        const day = today.getDate();
        const dayOfWeek = today.getDay();
    
        const arabicDate = ` ${days[dayOfWeek]} - ${day} ${months[month]} `;
        return arabicDate;
    }
    
    document.getElementById('date').textContent = getArabicDate();
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var period = hours >= 12 ? 'م' : 'ص';
    
        hours = hours % 12;
        hours = hours ? hours : 12; // تعيين الساعة لـ 12 إذا كانت القيمة 0
    
        minutes = minutes < 10 ? '0' + minutes : minutes; // إضافة صفر إذا كانت القيمة أقل من 10
        seconds = seconds < 10 ? '0' + seconds : seconds; // إضافة صفر إذا كانت القيمة أقل من 10
    
        var timeString = hours + ':' + minutes + ':' + seconds + ' ' + period;
        document.getElementById('clock').textContent = timeString;
    }
    updateClock();
    setInterval(updateClock, 1000); // تحديث الساعة كل ثانية
    
    
        document.addEventListener('scroll', function() {
            var scrollTop = document.documentElement.scrollTop;
            var scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var progress = (scrollTop / scrollHeight) * 100;
            document.querySelector('.progress-bar').style.width = progress + '%';
        
            if (progress >= 90) { // عندما يصل المستخدم إلى 90% من الصفحة
                document.querySelector('.end-message').style.display = 'block';
                setTimeout(function() {
                    document.querySelector('.end-message').style.display = 'none';
                }, 1500); // 1.5 ثانية
            }
        });
        document.getElementById('downloadButton').addEventListener('click', function() {

            $('#confirmationModal').modal('show');
        
        });
        
        
        
        document.getElementById('confirmDownloadButton').addEventListener('click', function() {
        
            var imageSrc = document.getElementById('modalImage').src;
        
            var a = document.createElement('a');
        
            a.href = imageSrc;
        
            a.download = 't3lm.jpg';
        
            document.body.appendChild(a);
        
            a.click();
        
            document.body.removeChild(a);
        
            $('#confirmationModal').modal('hide'); // إخفاء مودال التأكيد
        
            $('#downloadedModal').modal('show'); // عرض مودال بعد تحميل الصورة
        
        });
        
        // إضافة حدث النقر لزر "اكمل القراءة"
        
        document.querySelector('.close-all-modals').addEventListener('click', function() {
        
            $('.modal').modal('hide');
        
        });
        
        
        
        // copy
        
        
        
        function copyPostLink() {
        
                var postLink = window.location.href;
        
                var copyText = document.getElementById("postLink");
        
                copyText.value = postLink;
        
                copyText.select();
        
                document.execCommand("copy");
        
        
        
                $('#copiedModal').modal('show'); // اظهار المودال بعد النسخ
        
            }    
        
            
        
            
        
            var postLink = window.location.href;
        
        
        
        // ضع الرابط في حقل النص
        
        document.getElementById("postLink").value = postLink;
        
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('close-all-modals')) {
                $('.modal').modal('hide'); // ????? ???? ?????????
            }
        });
        
        
        
                            